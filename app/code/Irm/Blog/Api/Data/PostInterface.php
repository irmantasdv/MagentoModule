<?php declare(strict_types=1);

namespace Irm\Blog\Api\Data;

/**
 * Blog post interface
 * @api
 * @since 1.0.0
 */
interface PostInterface
{
    const ID = 'id';
    const TITLE = 'title';
    const CONTENT = 'content';
    const CREATED_AT = 'creation_time';

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getContent();

    /**
     * @param string $text
     * @return $this
     */
    public function setContent($text);

    /**
     * @return string
     */
    public function getCreatedAt();


}
