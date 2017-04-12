<?php

namespace Knutte\Navbar;

/**
 * Navbar to generate HTML för a navbar from a configuration array.
 */
class Navbar implements \Anax\Common\ConfigureInterface
{
    use \Anax\Common\ConfigureTrait;


    /**
     * Get HTML for the navbar.
     *
     * @param string $route the current route.
     * @param callable $urlCreate to create framework urls.
     *
     * @return string as HTML with the navbar.
     */
    public function getHTML($route, $urlCreate)
    {
        // $conf = $this->config["config"];
        $items = $this->config["items"];

        $html = "";

        foreach ($items as $name => $vars) {
            $url = $urlCreate->create($vars["route"]);
            $curr = $route == $vars["route"] ? 'current' : '';
            $text = $vars["text"];

            $html .= "<li class='$name'>";
            $html .= "<div class='navCircle ${name}Color'></div>";
            $html .= "<a href='$url' class='$name $curr'>$text</a>";

            // If there are dropdown alternatives.
            if (count($vars["dropdown"]) > 0) {
                $html.= "<ul>";
                foreach ($vars["dropdown"] as $dropName => $dropVars) {
                    $dropUrl = $urlCreate->create($dropVars["route"]);
                    $dropText = $dropVars["text"];

                    $html .= "<li class='drop $dropName'>";
                    $html .= "<div class='navCircle ${dropName}Color'></div>";
                    $html .= "<a href='$dropUrl'>$dropText</a>";
                    $html .= "</li>";
                }
                $html.= "</ul>";
            }

            $html .= "</li>";
        }
        return $html;
    }
}
