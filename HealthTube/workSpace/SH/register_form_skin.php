 <? if ($config[cf_use_tel]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>전화번호</TD>
            <TD class=m_padding><input class=ed type=text name='mb_tel' size=21 maxlength=20 <?=$config[cf_req_tel]?'required':'';?> itemname='전화번호' value='<?=$member[mb_tel]?>'></TD>
        </TR>
        <? } ?>

        <? if ($config[cf_use_hp]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>핸드폰번호</TD>
            <TD class=m_padding>
              <iframe name=ifr_temp id=ifr_temp style='display:none'></iframe>
             <input class=ed type=text name='mb_hp' size=21 maxlength=20 <?=$config[cf_req_hp]?'required':'';?> itemname='핸드폰번호' value='<?=$member[mb_hp]?>' onchange="this.form.mb_9.value=''">
             (예:010-123-1234)
             <input type=button value='인증번호받기' onclick="ifr_temp.location='/_dweb_send_sms_auth_no.php?send_to='+this.form.mb_hp.value;div_inputAuthno.style.display=''">
             
             
             <div id=div_inputAuthno style='display:none'>
             인증번호:
             <input class=ed type=hidden name='mb_9' size=5 maxlength=5>
             <input class=ed type=text name='mb_10' size=5 maxlength=5  onchange="this.form.mb_9.value=''">
             <input type=button value='인증번호확인' onclick="ifr_temp.location='/_dweb_check_authno.php?hpno='+this.form.mb_hp.value+'&authno='+this.form.mb_10.value;">
             </div>
            </TD>
        </TR>
        <? } ?>

        <? if ($config[cf_use_addr]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>주소</TD>
            <TD valign="middle" class=m_padding>
                <table width="330" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="25"><input class=ed type=text name='mb_zip1' size=4 maxlength=3 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='우편번호 앞자리' value='<?=$member[mb_zip1]?>'>
                         - 
                        <input class=ed type=text name='mb_zip2' size=4 maxlength=3 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='우편번호 뒷자리' value='<?=$member[mb_zip2]?>'>
                        &nbsp;<a href="javascript:;" onclick="win_zip('fregisterform', 'mb_zip1', 'mb_zip2', 'mb_addr1', 'mb_addr2');"><img width="91" height="20" src="<?=$member_skin_path?>/img/post_search_btn.gif" border=0 align=absmiddle></a></td>
                </tr>
                <tr>
                    <td height="25" colspan="2"><input class=ed type=text name='mb_addr1' size=60 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='주소' value='<?=$member[mb_addr1]?>'></td>
                </tr>
                <tr>
                    <td height="25" colspan="2"><input class=ed type=text name='mb_addr2' size=60 <?=$config[cf_req_addr]?'required':'';?> itemname='상세주소' value='<?=$member[mb_addr2]?>'></td>
                </tr>
                </table>
            </TD>
        </TR>
        <? } ?>