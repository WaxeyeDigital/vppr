<?php

namespace Drupal\vppr\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  public function alterRoutes(RouteCollection $collection) {
    //For all the necessary admin routes grant permission.
    // admin/structure/taxonomy
    if ($route = $collection->get('entity.taxonomy_vocabulary.collection')) {
      $route->setRequirements(array(
        '_custom_access' => '\vppr_route_access',
      ));
      $route->setOption('op', 'index');
    }

    // /admin/structure/taxonomy/manage/{taxonomy_vocabulary}/overview
    if ($route = $collection->get('entity.taxonomy_vocabulary.overview_form')) {
      $route->setRequirements(array(
        '_custom_access' => '\vppr_route_access',
      ));
      $route->setOption('op', 'list terms');
    }


    // admin/structure/taxonomy/manage/{taxonomy_vocabulary}/add
    if ($route = $collection->get('entity.taxonomy_vocabulary.overview_form')) {
      $route->setRequirements(array(
        '_custom_access' => '\vppr_route_access',
      ));
    }

    // admin/structure/taxonomy/manage/{taxonomy_vocabulary}
    if ($route = $collection->get('entity.taxonomy_vocabulary.edit_form')) {
      $route->setRequirements(array(
        '_custom_access' => '\vppr_route_access',
      ));
    }

    // taxonomy/term/{taxonomy_term}/edit
    if ($route = $collection->get('entity.taxonomy_term.edit_form')) {
      $route->setRequirements(array(
        '_custom_access' => '\vppr_route_access',
      ));
    }

    if ($route = $collection->get('entity.taxonomy_term.add_form')) {
      $route->setRequirements(array(
        '_custom_access' => '\vppr_route_access',
      ));
    }

    // admin/structure/taxonomy/%vocabulary/delete
    if ($route = $collection->get('entity.taxonomy_vocabulary.delete_form')) {
      $route->setRequirements(array(
        '_custom_access' => '\vppr_route_access',
      ));
    }
    // taxonomy/term/{taxonomy_term}/delete
    if ($route = $collection->get('entity.taxonomy_term.delete_form')) {
      $route->setRequirements(array(
        '_custom_access' => '\vppr_route_access',
      ));
    }
    // Reset order.
    if ($route = $collection->get('entity.taxonomy_vocabulary.reset_form')) {
      $route->setRequirements(array(
        '_custom_access' => '\vppr_route_access',
      ));
    }
    $route->setOption('op', '');
  }
}

