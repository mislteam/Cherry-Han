<?php
use Illuminate\Support\Facades\DB;

if (!function_exists('apiAuth')) {
    function apiAuth()
    {
        return \App\Models\ApiUser::whereId(accessToken()->api_user_id)->first();
    }
}

if (!function_exists('accessToken')) {
    function accessToken()
    {
        return \App\Models\Token::where('token',request()->bearerToken())->first();
    }
}

if (!function_exists('apiUserName')) {
    function apiUserName():string
    {
        $apiUser = apiAuth();
        return $apiUser->name ?? 'Unired';
    }
}

if (!function_exists('abort_if_forbidden')) {
    function abort_if_forbidden(string $permission,$message = "You have not permission to this page!"):void
    {
        abort_if(is_null(auth()->user()) || !auth()->user()->can($permission),403,$message);
    }
}

if (!function_exists('setUserTheme')) {
    function setUserTheme($theme)
    {
        $classes = [
            'default' => [
                'body' => '',
                'nav' => ' navbar-light ',
                'sidebar' => 'sidebar-dark-primary ',
            ],
            'light' => [
                'body' => '',
                'nav' => ' navbar-white ',
                'sidebar' => ' sidebar-light-lightblue '
            ],
            'dark' => [
                'body' => ' dark-mode ',
                'nav' => ' navbar-dark ',
                'sidebar' => ' sidebar-dark-secondary '
            ]
        ];
        return $classes[$theme] ?? [
                'body' => '',
                'nav' => ' navbar-light ',
                'sidebar' => 'sidebar-dark-primary ',
            ];
    }
}

if (!function_exists('price_format')) {
    function price_format($price)
    {
        return number_format($price, 2, ".", " ");
    }
}
if (!function_exists('nf')) {
    function nf($number)
    {
        return number_format($number, 0, "", " ");
    }
}

if (!function_exists('convert_text_latin')) {
    function convert_text_latin($text)
    {
        $cyr = [
            'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п',
            'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я',
            'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П',
            'Р', 'С', 'Т', 'У', 'Ў', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я'
        ];
        $lat = [
            'a', 'b', 'v', 'g', 'd', 'e', 'yo', 'j', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
            'r', 's', 't', 'u', 'f', 'h', 'ts', 'ch', 'sh', 'sh', 'a', 'i', 'y', 'e', 'yu', 'ya',
            'A', 'B', 'V', 'G', 'D', 'E', 'Yo', 'J', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P',
            'R', 'S', 'T', 'U', 'O', 'F', 'H', 'Ts', 'Ch', 'Sh', 'Sh', 'A', 'I', 'Y', 'e', 'Yu', 'Ya'
        ];
        $textlat = mb_strtoupper(removeChars(str_replace($cyr, $lat, $text)));
        return $textlat;
    }
}

if (!function_exists('removeChars')) {
    function removeChars($value)
    {
        $title = str_replace(array('\'', '"', ',', ';', '.', '’','-','‘','/'), ' ', $value);
        return $title;
    }
}

if (!function_exists('removeMarks')) {
    function removeMarks($value)
    {
        $title = str_replace(array('\'', '’','‘','`','?'), '', $value);
        return $title;
    }
}

if (!function_exists('phoneFormat')) {
    function phoneFormat($value)
    {
        if (strlen($value) == 11) // 09123456789
            return '+95'.(int)$value;
        else
            return $value;
    }
}
if (!function_exists('message_set'))
{
    function message_set($message,$type,$timer = 15)
    {
        session()->put('_message',$message);
        session()->put('_type',$type);
        session()->put('_timer',$timer*1000);
    }
}

if (!function_exists('error_message'))
{
    function error_message($message)
    {
        message_set($message,'error',5);
    }
}

if (!function_exists('success_message'))
{
    function success_message($message)
    {
        message_set($message,'success',5);
    }
}

if (!function_exists('warning_message'))
{
    function warning_message($message)
    {
        message_set($message,'warning',5);
    }
}

if (!function_exists('info_message'))
{
    function info_message($message)
    {
        message_set($message,'info',5);
    }
}

if (!function_exists('message_clear'))
{
    function message_clear()
    {
        session()->pull('_message');
        session()->pull('_type');
        session()->pull('_timer');
    }
}

if (!function_exists('sendByTelegram'))
{
    function sendByTelegram($message,$chatID,$token)
    {
        $url = "https://api.telegram.org/bot" . $token . "/sendMessage?parse_mode=HTML&chat_id=" . $chatID;
        $url = $url . "&text=" . urlencode($message);

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-type:application/json']);

        //ssl settings
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($ch);

        curl_close($ch);

        return $result;
    }
}

if (!function_exists('logObj'))
{
    function logObj($object)
    {
        $unset_list = [
            'updated_at',
            'created_at',
            'email_verified_at',
            'roles'
        ];

        foreach ($unset_list as $item) {
            unset($object->{$item});
            unset($object[$item]);
        }

        return json_encode($object);
    }
}

if(!function_exists('translate')){
    function translate($word){
        if(session('locale')){
            // $lang = app()->getLocale();
            $lang = session('locale');
        }else{
            //Session::put('locale', app()->getLocale());
            session([
                'locale' => app()->getLocale()
            ]);
        }
        $language = (session('locale') == 'en')? 'english':'myanmar';

        $dbword = \App\Models\Language::where('word', $word)->get();
        if(count($dbword) >=1){
            $return = $dbword[0][$language];
        }else{
            $data['word'] = $word;
            $data['english'] = ucwords(str_replace('_', ' ', $word));
            $data['myanmar'] = ucwords(str_replace('_', ' ', $word))." မြန်မာ";

            $lang = \App\Models\Language::create($data);
            $dbword = \App\Models\Language::where('word', $word)->get();
            $return = $dbword[0][$language];
            /*if($lang){
                $return = ucwords(str_replace('_', ' ', $word));
            }else{
                $return = ucwords($word);
            }*/
        }
        return $return;
    }
}


// Service Type
if(!function_exists('services_type')){
    function services_type(){
        $services = ['car_rental', 'car_container', 'car_cargo'];
        return $services;
    }
}

// Bannner Image
if(!function_exists('get_one_banner')){
    function get_one_banner($service){
        //$sql =  DB::select('SELECT banner_photo FROM "'.$tbl.'" WHERE service_type = "'.$service.'"');
        $sql =  \App\Models\Banner::where('service_type', $service)->first();
        if($sql){
         return $sql['banner_photo'];
        }
    
    }
        
}


// delivery status
if(!function_exists('delivery_status')){
    function delivery_status(){
        $status=array('processing','collected','handover','shipping','completed','cancelled');
        return $status;
    }
    
}

//booking
if(!function_exists('booking')){
    function booking($table){
       //$tour =  \App\Models\TourBooking::orderBy('id','desc')->first();
        
        $booking=DB::table($table)->orderBy('id','desc')->first();

        $id=($booking !=null)? $booking['id']: 0;

        if($id < 1  ){
          $id=1;
            return $count=str_pad($id, 10, '0', STR_PAD_LEFT);
        }else{
             $id+=1;
            return $count=str_pad($id, 10, '0', STR_PAD_LEFT);
        }
       
    }
    
}

//booking
if(!function_exists('orderdaybooking')){
    function orderdaybooking($table){

        $day=date("d");
        $month=date("m");
        $year=date('Y');

        //$deliverydaycount=DeliveryBooking::whereDay('created_at',$day)


        $orderdaycount=DB::table($table)
                ->whereMonth('created_at',$month)
                ->whereYear('created_at',$year)
                ->count();

        return $orderdaycount;
       
    }
    
}
        
//booking
if(!function_exists('ordermonthbooking')){
    function ordermonthbooking($table){

        $day=date("d");
        $month=date("m");
        $year=date('Y');

       $ordermonthcount=DB::table($table)
                ->whereMonth('created_at',$month)
                ->whereYear('created_at',$year)
                ->count();

    return $ordermonthcount;

       
    }
    
}

//booking
if(!function_exists('orderyearbooking')){
    function orderyearbooking($table){

        $day=date("d");
        $month=date("m");
        $year=date('Y');


        $orderyearcount=DB::table($table)
                ->whereYear('created_at',$year)
                ->count();

        return $orderyearcount;
    }
    
}

        




