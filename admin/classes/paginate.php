<?php
/**
 * The paginate class is used on the front end to create paginated views of photos
 *
 * @package     Pagination
 * @author      Blake Foss <blake@division442.com>
 * @version     1.0
 * @link        https://division442.com/gallery-demo 
 */

class Paginate {

    /**
     * Default config for this object.
     * 
     * @var string public variables
     * 
     */

    public $current_page;
    public $items_per_page;
    public $items_total_count;

    /**
     * Constructor: Checks and sets current page, how many items to display per page and the total image count.
     * 
     * @var string $current_page
     * @var string $items_per_page
     * @var string $items_total_count
     */ 
    public function __construct($current_page=1, $items_per_page=10, $items_total_count=0) {
        $this->current_page = (int)$current_page;
        $this->items_per_page = (int)$items_per_page;
        $this->items_total_count = (int)$items_total_count;
    }

    /**
     * Sets next page count.
     * 
     * @return int
     */ 
    public function next() {
        return $this->current_page + 1;
    }

    /**
     * Sets previous page count.
     * 
     * @return int
     */ 
    public function previous() {
        return $this->current_page - 1;
    }

    /**
     * Count total pages required based on items per page and photos uploaded.
     * 
     * @return int
     */ 
    public function page_total() {
        return ceil($this->items_total_count/$this->items_per_page);
    }

    /**
     * Checks to see if there is a previous page.
     * 
     * @return int|boolean
     */ 
    public function has_previous() {
        return $this->previous() >= 1 ? true : false;
    }

    /**
     * Checks to see if there is a next page.
     * 
     * @return int|boolean
     */ 
    public function has_next() {
        return $this->next() <= $this->page_total() ? true : false;
    }

    /**
     * Checks to see if there is a next page.
     * 
     * @return int
     */ 
    public function offset() {
        return ($this->current_page -1) * $this->items_per_page;
    }

}

?>