<?php
class Functions
{
  public function time_elapsed_string($datetime, $full = false)
  {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
      'y' => 'ano',
      'm' => 'mês',
      'w' => 'semana',
      'd' => 'dia',
      'h' => 'hora',
      'i' => 'minuto',
      's' => 'segundo',
    );
    foreach ($string as $k => &$v) {
      if ($diff->$k) {
        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
        unset($string[$k]);
      }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' atrás' : 'agora mesmo';
  }
}