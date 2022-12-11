<?php

namespace App\Builders;

class TableBuilder
{
    private array $attributes = [];

    private array $data = [];

    public function __construct($data = [])
    {
        $this->data($data);
    }

    public function __get(string $name): mixed
    {
        return $this->attributes[$name] ?? null;
    }

    public function __set(string $name, $value): void
    {
        $this->attributes[$name] = ($value ?? null);
    }

    public function __isset(string $name): bool
    {
        return isset($this->attributes[$name]);
    }

    public function __unset(string $name): void
    {
        unset($this->attributes[$name]);
    }

    public function attributes()
    {
        return $this->attributes;
    }

    public function data($data)
    {
        $this->data = $data;

        return $this;
    }

    public function head(array $data)
    {
        $this->attributes['head'] = $data;

        return $this;
    }

    public function caption(string $data)
    {
        $this->attributes['caption'] = $data;

        return $this;
    }

    public function style(string $data)
    {
        $this->attributes['style'] = $data;

        return $this;
    }

    public function foot(array $data)
    {
        $this->attributes['foot'] = $data;

        return $this;
    }

    public function render()
    {
        $caption = $this->renderCaption();
        $head = $this->renderHead();
        $body = $this->renderBody();
        $foot = $this->renderFoot();
        $style = $this->renderStyle();

        return <<<HTML
        <table style="{$style}">
            {$caption}
            {$head}
            {$body}
            {$foot}
        </table>
HTML;

    }


    private function renderCaption()
    {

        if ($this->caption) {
            return "<caption>{$this->attributes['caption']}</caption>";
        }

        return '';
    }

    private function renderStyle()
    {
        return ($this->style ?? '');
    }

    private function renderHead()
    {
        $content = '';

        if ($this->attributes['head']) {
            $thead = $this->attributes['head'];
        } else {
            $thead = (empty($this->data))
                ? []
                : array_keys(current($this->data));
        }

        if (!empty($thead)) {
            $content = "<thead>\n<tr>";
            foreach ($thead as $head) {
                $content .= "\n<th>{$head}</th>";
            }
            $content .= "\n</tr>\n</thead>";
        }

        return $content;
    }

    private function renderBody()
    {
        $content = '';
        if (!empty($this->data)) {
            $content = "<tbody>";
            foreach ($this->data as $row) {
                $content .= "\n<tr role='row'>";
                foreach ($row as $index => $cell) {
                    $content .= "\n<td>" . $row[$index] . "</td>";
                }
                $content .= "\n</tr>";
            }
            $content .= "\n</tbody>";
        }
        return $content;
    }

    private function renderFoot()
    {
        $content = '';

        if ($this->foot) {
            $tfoot = $this->attributes['foot'];
        }

        if (!empty($tfoot)) {
            $content = "<tfoot>\n<tr>";
            foreach ($tfoot as $foot) {
                $content .= "\n<th>{$foot}</th>";
            }
            $content .= "\n</tr>\n</tfoot>";
        }

        return $content;
    }
}
