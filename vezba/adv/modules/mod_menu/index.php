<div id="navigation">
            	<ul>
					<?php
					$menuitems = Menu::GetMenu(1);
					foreach($menuitems as $menuitem){
						echo "<li><a href='{$menuitem->link}'>{$menuitem->title}</a></li>";
					}
					?>
                </ul>
            </div><!-- navigation -->