<?php

class Adopt_conectionDB
{
  public function AdpSqlQuery($valor)
  {
    global $wpdb;

    $table_name = $wpdb->prefix . 'disclaimerInfor';

    try {

      if ($valor != null) {


        $welcome_text = 'Congratulations, you just completed the installation!';

        $result = $wpdb->insert(
          $table_name,
          array(
            'created_at' => current_time('mysql'),
            'disclaimerId' => $valor,
            'text' => $welcome_text,
          )
        );
        return $result;
      } else {

        $result =  $wpdb->get_results("SELECT * FROM $table_name ORDER BY created_at DESC LIMIT 1");

        if (!$result)
          return null;
        else
          return $result[0]->disclaimerId;
      }
    } catch (PDOException $e) {
      echo wp_kses_normalize_entities($e->getMessage());
    }
  }
}

function AdpExecComand($valors)
{
  $createDatabase = new Adopt_conectionDB();

  return $createDatabase->AdpSqlQuery($valors);
}
