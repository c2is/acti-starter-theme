<?php

namespace Capabilities;

final class Capabilities
{
    /**
     * @param $postTypeSlug
     * @param $role \WP_Role role to receive new capability
     */
    public static function addPostTypeCaps($postTypeSlug, $role)
    {
        $role->add_cap('read_' . $postTypeSlug);
        $role->add_cap('delete_' . $postTypeSlug);
        $role->add_cap('edit_' . $postTypeSlug . 's');
        $role->add_cap('edit_others_' . $postTypeSlug . 's');
        $role->add_cap('publish_' . $postTypeSlug . 's');
        $role->add_cap('read_private_' . $postTypeSlug . 's');
        $role->add_cap('edit_' . $postTypeSlug . 's');
    }

    /**
     * @param $cap string capabilty to add
     * @param $role \WP_Role role to receive new capability
     */
    public static function addCap($cap, $role)
    {
        $role->add_cap($cap);
    }

    /**
     * @param $caps array capabilties to add
     * @param $role \WP_Role role to receive new capability
     */
    public static function addCaps($caps, $role)
    {
        if (!empty($caps))
        {
            foreach ($caps as $cap) {
                $role->add_cap($cap);
            }
        }
    }
}