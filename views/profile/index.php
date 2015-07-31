<div class="body">
    <div class="profile_img">
        <?php if ($this->profile_image != null): ?>
            <img src="<?= URL . $this->profile_image ?>" height="400" width="300"/>
        <?php else:
            if ($this->gender == "m"): ?>
                <img src="<?= URL ?>public/images/male.png" height="400" width="300"/>
            <?php else: ?>
                <img src="<?= URL ?>public/images/female.png" height="400" width="300"/>
            <?php endif; ?>
        <?php endif; ?>
        <!--<img src="<?/*= URL */?>public/images/profile_picture/DSC00091.jpg" width="300" height="400 "/>-->
    </div>
    <div class="profile_details">
        <table align="center" class="edit_option">
            <tr>
                <td width="150"><b>Name :</b></td>
                <td><?= $this->name ?></td>
            </tr>
            <tr>
                <td><b>Birthday :</b></td>
                <td><?= $this->bd ?></td>
            </tr>
            <tr>
                <td><b>Address :</b></td>
                <td><?= $this->address ?></td>
            </tr>
            <tr>
                <td><b>Contact No. :</b></td>
                <td><?= $this->contact_no ?></td>
            </tr>
            <tr>
                <td><b>Email :</b></td>
                <td><?= $this->email_id ?></td>
            </tr>
            <?php if ($this->id == Session::get('profile_id')): ?>
                <tr>
                    <td colspan="2">
                        <button style="font-size: 16px; border: 1px solid" class="button"
                                onclick="editThis(<?= $this->id ?>)">Edit
                        </button>
                    </td>
                </tr>
            <?php elseif ($this->is_friend == true): ?>
                <tr>
                    <td colspan="2">
                        <button style="font-size: 16px; border: 1px solid; width: auto" class="button"
                                onclick="removeFriend(<?= $this->id ?>)">Remove Friend
                        </button>
                    </td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="2">
                        <button style="font-size: 16px; border: 1px solid; width: auto" class="button"
                                onclick="addFriend(<?= $this->id ?>)">Add As Friend
                        </button>
                    </td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>
