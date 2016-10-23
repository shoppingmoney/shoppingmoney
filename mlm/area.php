<option value="">Select Area</option>
<?php

include 'includes/config.php';
$conf = new config();

//echo "<option>".$_GET['id']."</option>";

                                          $rs = $conf->fetchall("state_district where district='".$_GET['id']."'");
                                          foreach($rs as $r)
                                          {
                                              echo "<option>".$r->area."</option>";
                                          }
                                          ?>

