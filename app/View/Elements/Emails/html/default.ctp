<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!-- HEADER -->
<table class="head-wrap" bgcolor="#337ab7">
    <tr>
        <td></td>
        <td class="header container" >

            <div class="content">
                <table bgcolor="#337ab7">
                    <tr>
                        <td style="height: 32px;"><img src="http://cupcherry.com/img/The-Most-Complete-Education-Solution.png" style="background: #ffffff; height: 50px; padding: 10px; width: 250px;" /></td>
                        <td align="right"><h6 class="collapse">Basic</h6></td>
                    </tr>
                </table>
            </div>

        </td>
        <td></td>
    </tr>
</table><!-- /HEADER -->


<!-- BODY -->
<table class="body-wrap" bgcolor="#EEEEEE">
    <tr>
        <td></td>
        <td class="container" bgcolor="#FFFFFF">

            <div class="content">
                <table>
                    <tr>
                        <td>
                            <?php
                            $content = explode("\n", $content);

                            foreach ($content as $line):
                                echo '<p> ' . $line . "</p>\n";
                            endforeach;
                            ?>						
                        </td>
                    </tr>
                </table>
            </div><!-- /content -->

        </td>
        <td></td>
    </tr>
</table><!-- /BODY -->


<!-- FOOTER -->
<table class="footer-wrap" bgcolor="#EEEEEE">
    <tr>
        <td></td>
        <td class="container">

            <!-- content -->
            <div class="content">
                <table>
                    <tr>
                        <td align="center">
                            <p>
                                <a href="#">Terms</a> |
                                <a href="#">Privacy</a> |
                                <a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>
                            </p>
                        </td>
                    </tr>
                </table>
            </div><!-- /content -->

        </td>
        <td></td>
    </tr>
</table><!-- /FOOTER -->

</body>
</html>