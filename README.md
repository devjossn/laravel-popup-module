# cookie-popup-module
Cookie popup module with admin in Laravel

************** How to use ****************

1. Execute "npm run dev" in [Modules/Popup].

2. Add <a>tag and <script src="js/popupShow.js"></script> into the main project's blade.php. <script>tag must be placed at the end of body.
	>>> For example, 
    you can insert <a href="{{ route('popup.open', ['id'=>2]) }}" class="ml-1 underline"  id="popupModal-button">Popup</a> 
    and <script src="js/popupShow.js"></script> into the main project's welcome.blade.php.

3, In the main project, exceute "php artisan module:migrate Popup" to create the tables.
	>>> You have to create a database manually before creating the tables.

4. In the main project, execute "php artisan serve".

5. You can modify the popup content in the "localhost:8000/popup/admin"  of Web browser.

