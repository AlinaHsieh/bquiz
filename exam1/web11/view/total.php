   <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
       <p class="t cent botli"><?= $this->header ?></p>
       <form method="post" action="./api/update_single.php">
               <table width="50%" style="margin: auto;">
                   <tbody>
                       <tr class="yel">
                           <td width="50%">進站總人數</td>
                           <td width="50%"><input type="text" name="total" value="<?=$this->find(1)['total']?>"></td>
                           
                       </tr>
                      
                   </tbody>
               </table>
               <table style="margin-top:40px; width:70%;">
                   <tbody>
                       <tr>
                           <input type="hidden" name="table" value="<?= $this->table ?>">
                           <td width="200px"></td>
                           <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                       </tr>
                   </tbody>
               </table>
           </form>
   </div>