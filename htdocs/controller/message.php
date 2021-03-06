<?php
class Messages
{
    public function getMessages($sql)
    {
        $prev = 0;
        while ($data = $sql->fetch()) {

            $text .= '<tr><td style="width:15%" valign="top">';

            if ($prev != $data['account_id']) {
                $text .= '<p class="user m-0">';
                $text .= date('[H:i]', $data['time']);
                $text .= '&nbsp;<span>' . $data['account_login'] . '</span>';
                $text .= ': </p>';
            }
            $text .= '</td>';
            $text .= '<td style="width:85%;padding-left:10px;" valign="top">';

            $message = htmlspecialchars($data['text']);

            $text .= $message . '<br />';
            $text .= '</td></tr>';

            $i++;
            $prev = $data['account_id'];
        }

        return $text;
    }
}
