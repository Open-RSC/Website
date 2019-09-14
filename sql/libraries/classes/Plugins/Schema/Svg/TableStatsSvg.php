<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Contains PhpMyAdmin\Plugins\Schema\Svg\TableStatsSvg class.
 */

namespace PhpMyAdmin\Plugins\Schema\Svg;

use PhpMyAdmin\Font;
use PhpMyAdmin\Plugins\Schema\TableStats;
use PhpMyAdmin\Plugins\Schema\ExportRelationSchema;

/**
 * Table preferences/statistics.
 *
 * This class preserves the table co-ordinates,fields
 * and helps in drawing/generating the Tables in SVG XML document.
 *
 * @name    Table_Stats_Svg
 * @see     PMA_SVG
 */
class TableStatsSvg extends TableStats
{
    /**
     * Defines properties.
     */
    public $height;

    public $currentCell = 0;

    /**
     * The "PhpMyAdmin\Plugins\Schema\Svg\TableStatsSvg" constructor.
     *
     * @param object  $diagram          The current SVG image document
     * @param string  $db               The database name
     * @param string  $tableName        The table name
     * @param string  $font             Font face
     * @param int $fontSize         The font size
     * @param int $pageNumber       Page number
     * @param int &$same_wide_width The max. width among tables
     * @param bool $showKeys         Whether to display keys or not
     * @param bool $tableDimension   Whether to display table position or not
     * @param bool $offline          Whether the coordinates are sent
     *
     *
     * @see PMA_SVG, Table_Stats_Svg::Table_Stats_setWidth,
     *       PhpMyAdmin\Plugins\Schema\Svg\TableStatsSvg::Table_Stats_setHeight
     */
    public function __construct(
        $diagram,
        $db,
        $tableName,
        $font,
        $fontSize,
        $pageNumber,
        &$same_wide_width,
        $showKeys = false,
        $tableDimension = false,
        $offline = false
    ) {
        parent::__construct(
            $diagram,
            $db,
            $pageNumber,
            $tableName,
            $showKeys,
            $tableDimension,
            $offline
        );

        // height and width
        $this->_setHeightTable($fontSize);
        // setWidth must me after setHeight, because title
        // can include table height which changes table width
        $this->_setWidthTable($font, $fontSize);
        if ($same_wide_width < $this->width) {
            $same_wide_width = $this->width;
        }
    }

    /**
     * Displays an error when the table cannot be found.
     *
     * @return void
     */
    protected function showMissingTableError()
    {
        ExportRelationSchema::dieSchema(
            $this->pageNumber,
            'SVG',
            sprintf(__('The %s table doesn\'t exist!'), $this->tableName)
        );
    }

    /**
     * Sets the width of the table.
     *
     * @param string  $font     The font size
     * @param int $fontSize The font size
     *
     * @return void
     *
     * @see    PMA_SVG
     */
    private function _setWidthTable($font, $fontSize)
    {
        foreach ($this->fields as $field) {
            $this->width = max(
                $this->width,
                Font::getStringWidth($field, $font, $fontSize)
            );
        }
        $this->width += Font::getStringWidth('  ', $font, $fontSize);

        /*
         * it is unknown what value must be added, because
         * table title is affected by the table width value
         */
        while ($this->width
            < Font::getStringWidth($this->getTitle(), $font, $fontSize)
        ) {
            $this->width += 7;
        }
    }

    /**
     * Sets the height of the table.
     *
     * @param int $fontSize font size
     *
     * @return void
     */
    private function _setHeightTable($fontSize)
    {
        $this->heightCell = $fontSize + 4;
        $this->height = (count($this->fields) + 1) * $this->heightCell;
    }

    /**
     * draw the table.
     *
     * @param bool $showColor Whether to display color
     *
     * @return void
     *
     * @see    PMA_SVG,PMA_SVG::printElement
     */
    public function tableDraw($showColor)
    {
        $this->diagram->printElement(
            'rect',
            $this->x,
            $this->y,
            $this->width,
            $this->heightCell,
            null,
            'fill:#007;stroke:black;'
        );
        $this->diagram->printElement(
            'text',
            $this->x + 5,
            $this->y + 14,
            $this->width,
            $this->heightCell,
            $this->getTitle(),
            'fill:#fff;'
        );
        foreach ($this->fields as $field) {
            $this->currentCell += $this->heightCell;
            $fillColor = 'none';
            if ($showColor) {
                if (in_array($field, $this->primary)) {
                    $fillColor = '#aea';
                }
                if ($field == $this->displayfield) {
                    $fillColor = 'none';
                }
            }
            $this->diagram->printElement(
                'rect',
                $this->x,
                $this->y + $this->currentCell,
                $this->width,
                $this->heightCell,
                null,
                'fill:'.$fillColor.';stroke:black;'
            );
            $this->diagram->printElement(
                'text',
                $this->x + 5,
                $this->y + 14 + $this->currentCell,
                $this->width,
                $this->heightCell,
                $field,
                'fill:black;'
            );
        }
    }
}