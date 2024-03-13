<?php

class TableBuilder
{
    private $caption;
    private $headers = [];
    private $rows = [];
    private $footer;

    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    public function addHeader($header)
    {
        $this->headers[] = $header;
    }

    public function addRow($row)
    {
        $this->rows[] = $row;
    }

    public function setFooter($footer)
    {
        $this->footer = $footer;
    }

    public function getTable()
    {
        $table = "<table>\n";
        if ($this->caption) {
            $table .= "<caption><b>{$this->caption}</b></caption>\n";
        }
        if (!empty($this->headers)) {
            $table .= "<thead>\n<tr>";
            foreach ($this->headers as $header) {
                $table .= "<th>$header</th>";
            }
            $table .= "</tr>\n</thead>\n";
        }
        if (!empty($this->rows)) {
            $table .= "<tbody>\n";
            foreach ($this->rows as $row) {
                $table .= "<tr>";
                foreach ($row as $cell) {
                    $table .= "<td>$cell</td>";
                }
                $table .= "</tr>\n";
            }
            $table .= "</tbody>\n";
        }
        if ($this->footer) {
            $table .= "<tfoot>\n<tr><th colspan=\"3\">{$this->footer}</th></tr>\n</tfoot>\n";
        }
        $table .= "</table>";
        return $table;
    }
}
