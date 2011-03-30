<?php

/**
 * peanutPageTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class PluginpeanutPageTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object peanutPageTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('peanutPage');
  }

  /**
   * Retrieves pages object.
   *
   * @return peanutPage
   */
  public function getItems()
  {
    $p = $this->createQuery('p')
            ->leftJoin('p.sfGuardUser s')
            ->leftJoin('p.peanutMenu m')
            ->orderBy('p.position ASC');

    return $p;
  }

  /**
   * Retrieves pages object by menu.
   *
   * @param  string|int $menu     The id or slug of menu
   *
   * @return peanutPage
   */
  public function getItemsByMenu($menu)
  {
    $p = $this->createQuery('p')
            ->leftJoin('p.sfGuardUser s')
            ->leftJoin('p.peanutMenu m')
            ->where('m.id = ?', $menu)
            ->orWhere('m.slug = ?', $menu)
            ->orderBy('p.position ASC');

    return $p;
  }

  /**
   * Retrieves pages object by menu and status.
   *
   * @param  string|int $menu     The id or slug of menu
   * @param  string     $status   The status of page
   *
   * @return peanutPage
   */
  public function getItemsByMenuAndStatus($menu, $status = 'publish')
  {
    $p = $this->createQuery('p')
            ->leftJoin('p.sfGuardUser s')
            ->leftJoin('p.peanutMenu m')
            ->where('m.id = ?', $menu)
            ->orWhere('m.slug = ?', $menu)
            ->andWhere('p.status = ?', $status)
            ->orderBy('p.position ASC');

    return $p;
  }

  /**
   * Retrieves pages object by author.
   *
   * @param  string|int $author   The id or username of author
   *
   * @return peanutPage
   */
  public function getItemsByAuthor($author)
  {
    $p = $this->createQuery('p')
            ->leftJoin('p.sfGuardUser s')
            ->leftJoin('p.peanutMenu m')
            ->where('s.id = ?', $author)
            ->orWhere('s.username = ?', $author)
            ->orderBy('p.position ASC');

    return $p;
  }

  /**
   * Retrieves pages object by author.
   *
   * @param  string|int $author   The id or username of author
   * @param  string     $status   The status of page
   *
   * @return peanutPage
   */
  public function getItemsByAuthorAndStatus($author, $status = 'publish')
  {
    $p = $this->createQuery('p')
            ->leftJoin('p.sfGuardUser s')
            ->leftJoin('p.peanutMenu m')
            ->where('s.id = ?', $author)
            ->orWhere('s.username = ?', $author)
            ->andWhere('p.status = ?', $status)
            ->orderBy('p.position ASC');

    return $p;
  }
}