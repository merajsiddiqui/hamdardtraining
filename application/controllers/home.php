<?php

/**
 * The Default Example Controller Class
 *
 * @author Meraj Ahmad Siddiqui <merajsiddiqui@outlook.com>
 */
use Framework\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Home extends Controller
{

    public function seo($params = array())
    {
        $seo = Registry::get("seo");
        foreach ($params as $key => $value) {
            $property = "set" . ucfirst($key);
            $seo->$property($value);
        }
        $params["view"]->set("seo", $seo);
    }

    public function index()
    {
        $view = $this->getActionView();
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
        $page= $this->getLayoutView();
        $page->set("page", "home");

    }

    public function contact()
    {
        $this->seo(array(
            "title"       => "Divine Technologies",
            "keywords"    => "Cpntact IT Solution, Grow Your Business, IT Ideas, Divine Help Line, Divine support, Query Online, ",
            "description" => "Any question you have regarding your business IT ideas. You can discuss with US we will guide you to a better world. ",
            "view"        => $this->getLayoutView(),
        ));
        $page= $this->getLayoutView();
        $page->set("page", "contact");

        $view = $this->getActionView();
        if (RequestMethods::post("submit") == "Send") {

            $from    = RequestMethods::post("email");
            $to      = "info@divinetechnology.in";
            $subject = " Mail From Cloud stuff Page, :" . RequestMethods::post("name") . "(" . RequestMethods::post("phone") . ")";
            $message = RequestMethods::post("message");

            $header = "From: " . $from . "\r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-Type: text/plain; charset=utf-8\r\n";
            $header .= "X-Priority: 1\r\n";
            if (mail($to, $subject, $message, $header)) {
                $view->set("message", "Your message has been received, we will contact you within 24 hours.");
            }
        }
    }
    public function about()
    {
        $this->seo(array(
            "title"       => "About Us Divine",
            "keywords"    => "Team , About Us, Mission, Details, Goals, Achievement",
            "description" => "Know About Divine and our team members. Our Missions and our goals which we want to achieve",
            "view"        => $this->getLayoutView(),
        ));
        $view = $this->getActionView();
        $page= $this->getLayoutView();
        $page->set("page", "about");
    }

    public function services()
    {
        $this->seo(array(
            "title"       => "Divine Technologies",
            "keywords"    => "Ask any question, mail us, contact us",
            "description" => "services",
            "view"        => $this->getLayoutView(),
        ));
        $view = $this->getActionView();
        $page= $this->getLayoutView();
        $page->set("page", "services");

    }

}
