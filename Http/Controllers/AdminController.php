<?php

namespace Modules\Popup\Http\Controllers;

use Modules\Popup\Entities\User;
use Modules\Popup\Entities\Popup;
use Modules\Popup\Entities\PopupAnimation;
use Modules\Popup\Entities\PopupButton;
use Modules\Popup\Entities\PopupContent;
use Modules\Popup\Entities\PopupImage;
use Modules\Popup\Entities\PopupPosition;

use Modules\Popup\Http\Controllers\Controller;
use Modules\Popup\Http\Requests\PopupStoreRequest;
use Modules\Popup\UploadTrait;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Model;

class AdminController extends Controller
{
    //use UploadTrait;

    // function __construct()
    // {
    //     $this->middleware('can:create popup', ['only' => ['create', 'store']]);
    //     $this->middleware('can:edit popup', ['only' => ['edit', 'update']]);
    //     $this->middleware('can:delete popup', ['only' => ['destroy']]);
    // }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('popup::admin.popup.index'); 
        
    }

    /**
     * Datatables Ajax Data
     *
     * @return mixed
     * @throws \Exception
     */
    public function datatables(Request $request)
    {
        if ($request->ajax() == true) {
            $data = DB::select('SELECT
                popups.id,
                popups.title,
                popup_contents.content,
                popup_images.image,
                popup_buttons.bt_name,
                popup_positions.side,
                popup_animations.animation,
                popup_positions.v_center
            FROM
                popups
                LEFT JOIN popup_contents ON popups.id = popup_contents.popup_id
                LEFT JOIN popup_images ON popups.id = popup_images.popup_id
                LEFT JOIN popup_buttons ON popups.id = popup_buttons.popup_id
                LEFT JOIN popup_positions ON popups.id = popup_positions.popup_id
                LEFT JOIN popup_animations ON popups.id = popup_animations.popup_id '
            );

            // $data = Model:: select(
            //     'popups.id',
            //     'popups.title',
            //     'popup_contents.content',
            //     'popup_images.image',
            //     'popup_buttons.bt_name',
            //     'popup_positions.side',
            //     'popup_animations.animation',
            //     'popup_positions.v_center'
            // )

            // $data = Popup::select([
            //     'id',
            //     'title',
            //     'content',
            //     'image', 
            //     'bt_name', 
            //     'side', 
            //     'animation', 
            //     'v_center', 
            // ]);

            // echo '<pre>';
            // var_dump($data);
            // exit;

            return Datatables::of($data)
                ->addColumn('action', function ($data) {
                    
                    $html='';
                    
                    $html.= '<a href="'.  route('admin.popup.edit', ['popup' => $data->id]) .'" class="btn btn-success btn-sm float-left mr-3"  id="popup-modal-button"><span tooltip="Edit" flow="left"><i class="fas fa-edit"></i></span></a>';
                
                    $html.= '<form method="post" class="float-left delete-form" action="'.  route('admin.popup.destroy') .'"><input type="hidden" name="_token" value="'. Session::token() .'"><input type="hidden" name="id" value="'. $data->id .'"><button type="submit" class="btn btn-danger btn-sm"><span tooltip="Delete" flow="right"><i class="fas fa-trash"></i></span></button></form>';

                    return $html; 
                })
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('popup::admin.popup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PopupStoreRequest $request)
    {
        try {

            $popup = new Popup();
            $popup->title = $request->title;
            $popup->save();
            $popup_id =$popup->id;

            $popup_content = new PopupContent();
            $popup_content->popup_id = $popup_id;
            $popup_content->content = $request->content;
            $popup_content->save();

            $popup_image = new PopupImage();
            $popup_image->popup_id = $popup_id;
            $popup_image->image = $request->image;
            $popup_image->save();

            $popup_button = new PopupButton();
            $popup_button->popup_id = $popup_id;
            $popup_button->bt_name = $request->bt_name;
            $popup_button->save();

            $popup_animation = new PopupAnimation();
            $popup_animation->popup_id = $popup_id;
            $popup_animation->animation = $request->formAnimation;
            $popup_animation->save();

            $popup_position = new PopupPosition;
            $popup_position->popup_id = $popup_id;
            $popup_position->side = $request->formRegularPosition; 
            $popup_position->v_center = $request->formCenter; 
            $popup_position->save();

            //Session::flash('success', 'Popup was created successfully.');
            //return redirect()->route('popup.index');

            return response()->json([
                'success' => 'Popup was created successfully.' // for status 200
            ]);

        } catch (\Exception $exception) {

            DB::rollBack();

            //Session::flash('failed', $exception->getMessage() . ' ' . $exception->getLine());
            /*return redirect()->back()->withInput($request->all());*/

            return response()->json([
                'error' => $exception->getMessage() . ' ' . $exception->getLine() // for status 200
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function show(Popup $popup)
    {
         return view('popup::admin.popup.show', compact('popup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->popup;

        $arr = DB::select('SELECT
        popups.id,
        popups.title,
        popup_contents.content,
        popup_buttons.bt_name,
        popup_images.image,
        popup_positions.side,
        popup_positions.v_center,
        popup_animations.animation 
    FROM
        popups
        LEFT JOIN popup_contents ON popups.id = popup_contents.popup_id
        LEFT JOIN popup_images ON popups.id = popup_images.popup_id
        LEFT JOIN popup_buttons ON popups.id = popup_buttons.popup_id
        LEFT JOIN popup_positions ON popups.id = popup_positions.popup_id
        LEFT JOIN popup_animations ON popups.id = popup_animations.popup_id 
    WHERE
        popups.id =?', [$id]);

        if(count($arr) > 0) {
            $popup = $arr[0];
        } else {
            $popup = null;
        }
        
        return view('popup::admin.popup.edit', compact('popup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Popup $popup)
    {
        try {

            if (empty($popup)) {
                //Session::flash('failed', 'Hobby Update Denied');
                //return redirect()->back();
                return response()->json([
                    'error' => 'Popup update denied.' // for status 200
                ]);   
            }
            $id = $request->id;
            $popup = Popup::find($id);
            $popup->title = $request->title;
            $popup->save();

            $popup_content = PopupContent::where('popup_id', $id)->first();
            $popup_content->content = $request->content;
            $popup_content->save();

            $popup_image = PopupImage::where('popup_id', $id)->first();
            $popup_image->image = $request->image;
            $popup_image->save();

            $popup_button = PopupButton::where('popup_id', $id)->first();
            $popup_button->bt_name = $request->bt_name;
            $popup_button->save();

            $popup_animation = PopupAnimation::where('popup_id', $id)->first();
            $popup_animation->animation = $request->formAnimation;
            $popup_animation->save();

            $popup_position = PopupPosition::where('popup_id', $id)->first();
            $popup_position->side = $request->formRegularPosition; 
            $popup_position->v_center = $request->formCenter; 
            $popup_position->save();

            //Session::flash('success', 'A popup updated successfully.');
            //return redirect('admin/popup');

            return response()->json([
                'success' => 'Popup update successfully.' // for status 200
            ]);

        } catch (\Exception $exception) {

            DB::rollBack();

            //Session::flash('failed', $exception->getMessage() . ' ' . $exception->getLine());
            /*return redirect()->back()->withInput($request->all());*/

            return response()->json([
                'error' => $exception->getMessage() . ' ' . $exception->getLine() // for status 200
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //$popup->delete();
        //return redirect('admin/popup')->with('success', 'Popup deleted successfully.');

        $id = $request->id;
        Popup::find($id)->delete();

        return response()->json([
            'success' => 'Popup deleted successfully.' // for status 200
        ]);
    }
}
