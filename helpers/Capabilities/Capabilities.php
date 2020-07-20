<?php

  namespace Capabilities;

  final class Capabilities
  {
    /**
     * Capabilites to only edit or create own post type
     *
     * @param $postTypeSlug string
     * @param $role \WP_Role role to receive new capability
     */
    public static function addOwnPostTypeCaps($postTypeSlug, $role)
    {
      $role->add_cap('read_' . $postTypeSlug);
      $role->add_cap('read_private_' . $postTypeSlug . 's');
      $role->add_cap('delete_' . $postTypeSlug);
      $role->add_cap('edit_' . $postTypeSlug);
      $role->add_cap('edit_' . $postTypeSlug . 's');
      $role->add_cap('edit_private_' . $postTypeSlug . 's');
      $role->add_cap('edit_published_' . $postTypeSlug . 's');
    }

    /**
     * Capabilites to edit, create, delete or publish post type
     *
     * @param $postTypeSlug string
     * @param $role \WP_Role role to receive new capability
     */
    public static function addPostTypeCaps($postTypeSlug, $role)
    {
      $role->add_cap('read_' . $postTypeSlug);
      $role->add_cap('read_private_' . $postTypeSlug . 's');
      $role->add_cap('edit_' . $postTypeSlug);
      $role->add_cap('edit_' . $postTypeSlug . 's');
      $role->add_cap('edit_private_' . $postTypeSlug . 's');
      $role->add_cap('edit_others_' . $postTypeSlug . 's');
      $role->add_cap('edit_published_' . $postTypeSlug . 's');
      $role->add_cap('delete_' . $postTypeSlug);
      $role->add_cap('delete_private_' . $postTypeSlug . 's');
      $role->add_cap('delete_published_' . $postTypeSlug . 's');
      $role->add_cap('delete_others_' . $postTypeSlug . 's');
      $role->add_cap('publish_' . $postTypeSlug . 's');
    }

    /**
     * @param $postTypeSlug string
     * @param $role \WP_Role role to drop capability
     */
    public static function removePostTypeCaps($postTypeSlug, $role)
    {
      $role->remove_cap('read_' . $postTypeSlug);
      $role->remove_cap('read_private_' . $postTypeSlug . 's');
      $role->remove_cap('edit_' . $postTypeSlug);
      $role->remove_cap('edit_' . $postTypeSlug . 's');
      $role->remove_cap('edit_private_' . $postTypeSlug . 's');
      $role->remove_cap('edit_others_' . $postTypeSlug . 's');
      $role->remove_cap('edit_published_' . $postTypeSlug . 's');
      $role->remove_cap('delete_' . $postTypeSlug);
      $role->remove_cap('delete_private_' . $postTypeSlug . 's');
      $role->remove_cap('delete_published_' . $postTypeSlug . 's');
      $role->remove_cap('delete_others_' . $postTypeSlug . 's');
      $role->remove_cap('publish_' . $postTypeSlug . 's');
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
     * @param $cap string capabilty to remove
     * @param $role \WP_Role role to drop capability
     */
    public static function removeCap($cap, $role)
    {
      $role->remove_cap($cap);
    }

    /**
     * @param $caps array capabilties to add
     * @param $role \WP_Role role to receive new capability
     */
    public static function addCaps($caps, $role)
    {
      if (!empty($caps)) {
        foreach ($caps as $cap) {
          $role->add_cap($cap);
        }
      }
    }

    /**
     * @param $caps array capabilties to add
     * @param $role \WP_Role role to drop capability
     */
    public static function removeCaps($caps, $role)
    {
      if (!empty($caps)) {
        foreach ($caps as $cap) {
          $role->remove_cap($cap);
        }
      }
    }
  }
