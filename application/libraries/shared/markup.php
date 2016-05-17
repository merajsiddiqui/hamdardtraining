<?php

/**
 * Description of markup
 *
 * @author Meraj Ahmad Siddiqui <merajsiddiqui@outlook.com>
 */

namespace Shared {

    class Markup {

        public function __construct() {
            // do nothing
        }

        public function __clone() {
            // do nothing
        }

        public static function errors($array, $key, $separator = "<br />", $before = "<br />", $after = "") {
            if (isset($array[$key])) {
                return $before . join($separator, $array[$key]) . $after;
            }
            return "";
        }

        public static function pagination($page) {
            if (strpos(URL, "?")) {
                $request = explode("?", URL);
                if (strpos($request[1], "&")) {
                    parse_str($request[1], $params);
                }

                $params["page"] = $page;
                return $request[0]."?".http_build_query($params);
            } else {
                $params["page"] = $page;
                return URL."?".http_build_query($params);
            }
            return "";
        }

        public static function models() {
            $model = array();
            $path = APP_PATH . "/application/models";
            $iterator = new \DirectoryIterator($path);

            foreach ($iterator as $item) {
                if (!$item->isDot()) {
                    array_push($model, substr($item->getFilename(), 0, -4));
                }
            }
            return $model;
        }

        public function convertCurrency($amount=1, $from="USD", $to="INR") {
            $session = Registry::get("session");
            $currency = $session->get("currency");
            if(!$currency) {
                $url = "http://www.google.com/finance/converter?a=$amount&from=$from&to=$to"; 
                $request = curl_init(); 
                $timeOut = 0;
                curl_setopt ($request, CURLOPT_URL, $url);
                curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt ($request, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
                curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, $timeOut);
                $response = curl_exec($request); 
                curl_close($request);

                $regularExpression     = '#\<span class=bld\>(.+?)\<\/span\>#s';
                preg_match($regularExpression, $response, $finalData);
                
                $currency = explode(" ", strip_tags($finalData[0]));
                $session->set("currency", $currency);
            }

            return $currency[0];
        }

    }

}