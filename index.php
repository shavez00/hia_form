<?php
session_start();
session_unset();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Head Injury Assessment Tool</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="author" content="@shavez00">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <div class="wrapper">
            <div id="main" style="padding:50px 0 0 0;">

                <!-- Form -->
                <form id="contact-form" action="how_much.php" method="get">
                    <h3>HIA 3</h3>
                    <h4>This form should be completed for every case of suspected and confirmed concussion and for any player developing symptoms or signs after the game
                        that may suggest the development of a delayed concussion. The form is to be completed after two nights’ sleep – including the night of the game.
                    </h4>
                    <div>
                        <label>
                            <span>
                                Today's date: <?php echo date("m/d/Y"); ?>
                            </span>
                        </label>
                    </div>
                    <div>
                        <label>
                            <span>Time form completed: (required)</span>
                            <input placeholder="Please enter a time" type="text" tabindex="1" name="time" required autofocus>
                        </label>
                    </div>
                    <div>
                        <label>
                            <span>Physician's Name: (required)</span>
                            <input placeholder="Please enter the physicians name" type="text" name="physician" tabindex="2" required>
                        </label>
                    </div>
                    <div>
                        <label>
                            <span>Player's Name: (required)</span>
                            <input placeholder="Please enter the players name" type="text" name="player" tabindex="3" required>
                        </label>
                    </div>
                    </br><h4>To the player: From the kick-off time until now:</h4>
                    <h3>HOW MANY</h3>
                    <h4>Identify any symptom you have experienced
                        since the injury or following the Game which is
                        not usually noted with Rugby.
                    </h4>
                    <table style="width 100%">
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Headaches</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Headaches">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>'Pressure in head'</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Pressure">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Neck pain</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Neck pain">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Nausea or vomiting</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Nausea">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Dizziness</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Dizziness">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Blurred vision</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Blurred vision">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Balance problems</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Balance problems">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Sensitivity to light</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Sensitivity to light">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Feeling slowed down</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Feeling slowed down">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Sensitivity to noise</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Sensitivity to noise">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Feeling like "in a fog"</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Feeling like in a fog">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>"Don't feel right"</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Dont feel right">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Difficulty concentrating</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Difficulty concentrating">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Difficulty remembering</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Difficulty remembering">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Fatigue or low energy</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Fatigue">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Confusion</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Confusion">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Drowsiness</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Drowsiness">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Trouble falling asleep/disturbed sleep</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Trouble falling asleep">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>More emotional</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="More emotional">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Irritability</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Irritability">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Sadness</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Sadness">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label>
                                        <span>Nervous or anxious</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" name="symptom[]" value="Nervousness">
                            </td>
                        </tr>
                    </table>
                    <div>
                        <label>
                            <span>ANTEROGRADE AMNESIA (amnesia after the injury)?</span>
                            <select name="Anterograde Amnesia"> 
                                <option value = "No">No</option> 
                                <option value = "Yes">Yes</option>
                            </select>
                            <input placeholder="If Yes, please input duration" type="text" name="Anterograde Amnesia duration" tabindex="4">
                        </label>
                    </div>
                    <div>
                        <label>
                            <span>RETROGRADE AMNESIA (amnesia before the injury)?</span>
                            <select name="Retrograde Amnesia"> 
                                <option value = "No">No</option> 
                                <option value = "Yes">Yes</option>
                            </select>
                            <input placeholder="If Yes, please input duration" type="text" name="Retrograde Amnesia duration" tabindex="5">
                        </label>
                    </div>
                    <div>
                        <button type="submit" id="contact-submit" tabindex="6">Next</button>
                    </div>
                </form>
                <!-- /Form -->

            </div>
        </div>

        <script src="js/scripts.js"></script>

    </body>
</html>