<?php
class DiagramHelper extends AppHelper {

    function matrix($v) {
        $where = array('entire_bank', 'marketing', 'production', 'it');
        $what = array('process', 'knowledge', 'risk', 'information');

        $out = '<table class="matrix">';

        $out .= '<tr><td>&nbsp;</td><td>' . implode('</td><td>', $what) . '</td></tr>';

        foreach($where as $wh) {
            $out .= '<tr><td>' . $wh . '</td>';
            foreach($what as $w) {
                switch($v[$wh . '_' . $w]) {
                    case 0:
                        $backgroundColor = '#fff';
                    break;

                    case 1:
                        $backgroundColor = '#b8e1ed';
                    break;

                    case 2:
                        $backgroundColor = '#84b4eb';
                    break;

                    default:
                        $backgroundColor = '#4896ed';
                }

                $out .= sprintf('<td style="background-color:%s">%s</td>', $backgroundColor, $v[$wh . '_' . $w]);
            }
            $out .= '</tr>';
        }

        $out .= '</table>';

        return $this->output($out);
    }

}
?>