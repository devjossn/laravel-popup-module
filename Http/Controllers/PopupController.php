<?php

namespace Modules\Popup\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Popup\Entities\Popup;
use Modules\Popup\Entities\PopupAnimation;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $this->open();
    }

    public function open()
    {
        $id = request('id', null);
        if($id == null) $id = 1;
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

        // echo '<pre>';
        // var_dump($data);
        // exit;

        if(count($arr) > 0) {
            $data = $arr[0];
        } else {
            $data = null;
        }

        if($data == null) $data = new Popup();

        if($data) {

            switch ($data->side) {
                case 'top':
                    $data->pos_val = '';
                    $data->pos_sub_val = '';
                    break;
                case 'topRight':
                    $data->pos_val = 'right';
                    $data->pos_sub_val = ' modal-side modal-top-right ';
                    break;
                case 'topLeft':
                    $data->pos_val = 'left';
                    $data->pos_sub_val = ' modal-side modal-top-left ';
                    break;
                case 'bottomRight':
                    $data->pos_val = 'right';
                    $data->pos_sub_val = ' modal-side modal-bottom-right ';
                    break;
                case 'bottomLeft':
                    $data->pos_val = 'left';
                    $data->pos_sub_val = ' modal-side modal-bottom-left ';
                    break;                    
                default:
                    $data->pos_val = '';
                    $data->pos_sub_val = '';
            }

            if($data->animation == 'on')
                $data->ani_val = 'fade';
            else 
                $data->ani_val = '';

            if($data->v_center == 'on')
                $data->center_val = 'modal-dialog-centered';
            else 
                $data->center_val = '';

        }
        
        return view('popup::popup_modal/open', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('popup::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('popup::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('popup::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
