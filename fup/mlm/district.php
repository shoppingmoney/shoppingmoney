<option value=''>Select District</option>
<?php

include 'includes/config.php';
$conf = new config();

//echo "<option>".$_GET['id']."</option>";

                                          $rs = $conf->fetchall("state_district where state='".$_GET['id']."' group by district");
                                          foreach($rs as $r)
                                          {
                                              echo "<option>".$r->district."</option>";
                                          }
                                          ?>

