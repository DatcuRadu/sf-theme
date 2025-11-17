<?php

class SF_Mobile_Walker extends Walker_Nav_Menu {

    // Start LEVEL (sub-menu)
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);

        $output .= "\n$indent<ul class=\"sf-slide-menu__sub-menu\">\n";

        // Buton Back
        $output .= "$indent\t<li class=\"sf-slide-menu__back\">
                <span class=\"sf-slide-menu__arrow\">
                    <i class=\"fa fa-angle-left\"></i>
                </span>
                <a href=\"#\" class=\"sf-slide-menu__item__link sf-slide-menu__sub-item__back\">Back</a>
            </li>\n";
    }

    // End LEVEL
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    // Start ITEM
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

        $indent = ( $depth ) ? str_repeat("\t", $depth) : '';

        $classes = array('sf-slide-menu__item');
        $class_names = implode(' ', $classes);

        $output .= "$indent<li class=\"$class_names\">";

        // arrow only dacă are submeniuri
        $has_children = in_array('menu-item-has-children', $item->classes);

        if ($has_children) {
            $output .= '<span class="sf-slide-menu__arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>';
        }

        // link
        $output .= '<a href="' . esc_attr($item->url) . '" class="sf-slide-menu__item__link">'
            . esc_html($item->title)
            . '</a>';
    }

    // End ITEM
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}
