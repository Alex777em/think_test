<?php

namespace App\Walkers;

use Walker_Nav_Menu;

class MegaMenuWalker extends Walker_Nav_Menu
{
    private $last_parent_id; // Store the last parent menu item ID

// Start the element output
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {

        $has_children = !empty($args->walker->has_children);

        // Store the parent menu item ID if it has children
        if ($has_children && $depth === 0) {
            $this->last_parent_id = $item->ID;
            $output .= '<li class="menu-item has-children" data-featured-image="' . esc_url($this->get_featured_image_url($item)) . '">';
            $output .= '<a href="' . esc_url($item->url) . '" class="block has-children">' . esc_html($item->title) . '<span class="arrow"></span></a>';
            $output .= '<div class="submenu-wrapper absolute">';
            $output .= '<a href="' . esc_url($item->url) . '" class="view-all-button block">View all</a>';
        } else {
            $output .= '<li class="menu-item" data-featured-image="' . esc_url($this->get_featured_image_url($item)) . '">';
            $output .= '<a href="' . esc_url($item->url) . '" class="block">' . esc_html($item->title) . '</a>';
        }
    }

    // End the element output
    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= '</li>';
    }

    // Start the submenu output
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '<ul class="submenu">';
    }

    // End the submenu output
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '</ul></div>';

        // Display the featured image for the parent menu item after the submenu
        if ($this->last_parent_id) {
            $featured_image = $this->get_featured_image($this->last_parent_id);

            if ($featured_image) {
                $output .= '<div class="featured-image">';
                $output .= '<img src="' . esc_url($featured_image['url']) . '" alt="' . esc_attr($featured_image['alt']) . '" class="featured-image-src w-full h-auto">';
                $output .= '</div>';
            }
        }

        $this->last_parent_id = null;
    }

    // Get the featured image ACF URL
    private function get_featured_image_url($item)
    {

        $featured_image = get_field('featured_image', $item);

        if (is_array($featured_image) && !empty($featured_image['url'])) {
            return $featured_image['url'];
        }

        return '';
    }

    // Get the featured image ACF field
    private function get_featured_image($item_id)
    {
        $featured_image = get_field('featured_image', $item_id);

        if (is_array($featured_image) && isset($featured_image['url']) && !empty($featured_image['url'])) {
            return $featured_image;
        }

        return null;
    }
}

