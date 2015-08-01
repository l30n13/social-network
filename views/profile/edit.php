<style type="text/css">
    input[type="text"], input[type="date"], textarea, select {
        padding: 1.5%;
        width: 95%;
        background: #fff;
        font-family: 'Open Sans', sans-serif;
        font-size: 95%;
        color: #555;
    }
</style>

<div class="body">
    <div class="profile_details">
        <form action="<?= URL ?>profile/saveAfterEdit" method="post" enctype="multipart/form-data">
            <div class="profile_img" style="float:left;">
                <?php if ($this->profile_image != null): ?>
                    <img src="<?= URL . $this->profile_image ?>" height="400" width="300"/>
                <?php else:
                    if (Session::get('gender') == "m"): ?>
                        <img src="<?= URL ?>public/images/male.png" height="400" width="300"/>
                    <?php else: ?>
                        <img src="<?= URL ?>public/images/female.png" height="400" width="300"/>
                    <?php endif; ?>
                <?php endif; ?>
                <!--<img src="<? /*= URL */ ?>public/images/profile_picture/DSC00091.jpg" width="300" height="400 "/>-->
                <!--<button type="file">Upload Image</button>-->
                <input type="file" name="image"/>
            </div>
            <table align="center" class="edit_option">
                <tr>
                    <td width="150"><b>Name :</b></td>
                    <td>
                        <input type="text" placeholder="First Name" name="f_name"
                               value="<?= ($this->f_name != null) ? $this->f_name : "" ?>"/>
                        <input type="text" placeholder="Middle Name" name="m_name"
                               value="<?= ($this->m_name != null) ? $this->m_name : "" ?>" style="width: 45.3%"/>
                        <input type="text" placeholder="Last Name" name="l_name"
                               value="<?= ($this->l_name != null) ? $this->l_name : "" ?>" style="width: 45.3%"/>
                    </td>
                </tr>
                <tr>
                    <td><b>Birthday :</b></td>
                    <td>
                        <select name="day" style="width: 32%">
                            <option>Day</option>
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                if ($this->day == $i) {
                                    echo "<option selected value=$i>$i</option>";
                                    continue;
                                }
                                echo "<option value=$i>$i</option>";
                            }
                            ?>
                        </select>
                        <select name="month" style="width: 32%">
                            <option>Month</option>
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                if ($this->month == $i) {
                                    echo "<option selected value=$i>$i</option>";
                                    continue;
                                }
                                echo "<option value=$i>$i</option>";
                            }
                            ?>
                        </select>
                        <select name="year" style="width: 32%">
                            <option>Year</option>
                            <?php
                            for ($i = 1800; $i <= 2015; $i++) {
                                if ($this->year == $i) {
                                    echo "<option selected value=$i>$i</option>";
                                    continue;
                                }
                                echo "<option value=$i>$i</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><b>Address :</b></td>
                    <td>
                    <textarea placeholder="Address" name="address">
                        <?= ($this->address != null) ? $this->address : "" ?>
                    </textarea>
                    </td>
                </tr>
                <tr>
                    <td><b>Contact No. :</b></td>
                    <td>
                        <input type="text" placeholder="Contact No." name="contact_no"
                               value="<?= ($this->contact_no != null) ? $this->contact_no : "" ?>"/>
                    </td>
                </tr>
                <tr>
                    <td><b>Email :</b></td>
                    <td><input type="text" placeholder="Email" name="email"
                               value="<?= ($this->email_id != null) ? $this->email_id : "" ?>"/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button style="font-size: 16px; border: 1px solid" class="button" type="submit">
                            Edit
                        </button>
                        <button style="font-size: 16px; border: 1px solid" class="button"
                                onclick="cancelThis(<?= $this->id ?>)">Cancel
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
