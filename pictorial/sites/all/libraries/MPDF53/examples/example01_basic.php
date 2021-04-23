<?php


$html = '
<h1><a name="top"></a>mPDF</h1>
<h2>Basic HTML Example</h2>
This file demonstrates most of the HTML elements.
<h3>Heading 3</h3>
<h4>Heading 4</h4>
<h5>Heading 5</h5>
<h6>Heading 6</h6>
<p>P: Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus. Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla. Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci. </p>

<hr />

<div><img src="tiger.wmf" style="float:right;">DIV: Proin aliquet lorem id felis. Curabitur vel libero at mauris nonummy tincidunt. Donec imperdiet. Vestibulum sem sem, lacinia vel, molestie et, laoreet eget, urna. Curabitur viverra faucibus pede. Morbi lobortis. Donec dapibus. Donec tempus. Ut arcu enim, rhoncus ac, venenatis eu, porttitor mollis, dui. Sed vitae risus. In elementum sem placerat dui. Nam tristique eros in nisl. Nulla cursus sapien non quam porta porttitor. Quisque dictum ipsum ornare tortor. Fusce ornare tempus enim. </div>
<div><img src="klematis.jpg" style="opacity: 0.5; float: left;" />DIV: Proin aliquet lorem id felis. Curabitur vel libero at mauris nonummy tincidunt. Donec imperdiet. Vestibulum sem sem, lacinia vel, molestie et, laoreet eget, urna. Curabitur viverra faucibus pede. Morbi lobortis. Donec dapibus. Donec tempus. Ut arcu enim, rhoncus ac, venenatis eu, porttitor mollis, dui. Sed vitae risus. In elementum sem placerat dui. Nam tristique eros in nisl. Nulla cursus sapien non quam porta porttitor. Quisque dictum ipsum ornare tortor. Fusce ornare tempus enim. </div>

<blockquote>Blockquote: Maecenas arcu justo, malesuada eu, dapibus ac, adipiscing vitae, turpis. Fusce mollis. Aliquam egestas. In purus dolor, facilisis at, fermentum nec, molestie et, metus. Maecenas arcu justo, malesuada eu, dapibus ac, adipiscing vitae, turpis. Fusce mollis. Aliquam egestas. In purus dolor, facilisis at, fermentum nec, molestie et, metus.</blockquote>

<address>Address: Vestibulum feugiat, orci at imperdiet tincidunt, mauris erat facilisis urna, sagittis ultricies dui nisl et lectus. Sed lacinia, lectus vitae dictum sodales, elit ipsum ultrices orci, non euismod arcu diam non metus.</address>

<pre>PRE: Cum sociis natoque penatibus et magnis dis parturient montes, 
nascetur ridiculus mus. In suscipit turpis vitae odio. Integer convallis 
dui at metus. Fusce magna. Sed sed lectus vitae enim tempor cursus. Cras 
sed, posuere et, urna. Quisque ut leo. Aliquam interdum hendrerit tortor. 
Vestibulum elit. Vestibulum et arcu at diam mattis commodo. Nam ipsum sem, 
ultricies at, rutrum sit amet, posuere nec, velit. Sed molestie mollis dui.</pre>

<div><a href="#top">Hyperlink (&lt;a&gt;)</a></div>
<div><a href="http://www.pallcare.info">Hyperlink (&lt;a&gt;)</a></div>

<div>Styles - <tt>tt(teletype)</tt> <i>italic</i> <b>bold</b> <big>big</big> <small>small</small> <em>emphasis</em> <strong>strong</strong> <br />new lines<br>
<code>code</code> <samp>sample</samp> <kbd>keyboard</kbd> <var>variable</var> <cite>citation</cite> <abbr>abbr.</abbr> <acronym>ACRONYM</acronym> <sup>sup</sup> <sub>sub</sub> <strike>strike</strike> <s>strike-s</s> <u>underline</u> <del>delete</del> <ins>insert</ins> <q>To be or not to be</q> <font face="sans-serif" color="#880000" size="5">font changing face, size and color</font>
</div>

<p style="font-size:15pt; color:#440066">Paragraph using the in-line style to determine the font-size (15pt) and colour</p>


<h3>Testing BIG, SMALL, UNDERLINE, STRIKETHROUGH, FONT color, ACRONYM, SUPERSCRIPT and SUBSCRIPT</h3>
<p>This is <s>strikethrough</s> in <b><s>block</s></b> and <small>small <s>strikethrough</s> in <i>small span</i></small> and <big>big <s>strikethrough</s> in big span</big> and then <u>underline and <s>strikethrough and <sup>sup</sup></s></u> but out of span again but <font color="#000088">blue</font> font and <acronym>ACRONYM</acronym> text</p>

<p>This is a <font color="#008800">green reference<sup>32-47</sup></font> and <u>underlined reference<sup>32-47</sup></u> then reference<sub>32-47</sub> and <u>underlined reference<sub>32-47</sub></u> then <s>Strikethrough reference<sup>32-47</sup></s> and <s>strikethrough reference<sub>32-47</sub></s></p> 

<p><big>Repeated in <u>BIG</u>: This is reference<sup>32-47</sup> and <u>underlined reference<sup>32-47</sup></u> then reference<sub>32-47</sub> and <u>underlined reference<sub>32-47</sub></u> but out of span again but <font color="#000088">blue</font> font and <acronym>ACRONYM</acronym> text</big></p> 

<p><small>Repeated in small: This is reference<sup>32-47</sup> and <u>underlined reference<sup>32-47</sup></u> then reference<sub>32-47</sub> and <u>underlined reference<sub>32-47</sub></u> but out of span again but <font color="#000088">blue</font> font and <acronym>ACRONYM</acronym> text</small></p>

<p>The above repeated, but starting with a paragraph with font-size specified (7pt)</p>

<p style="font-size:7pt;">This is <s>strikethrough</s> in block and <small>small <s>strikethrough</s> in small span</small> and then <u>underline</u> but out of span again but <font color="#000088">blue</font> font and <acronym>ACRONYM</acronym> text</p>

<p style="font-size:7pt;">This is <s>strikethrough</s> in block and <big>big <s>strikethrough</s> in big span</big> and then <u>underline</u> but out of span again but <font color="#000088">blue</font> font and <acronym>ACRONYM</acronym> text</p>

<p style="font-size:7pt;">This is reference<sup>32-47</sup> and <u>underlined reference<sup>32-47</sup></u> then reference<sub>32-47</sub> and <u>underlined reference<sub>32-47</sub></u> then <s>Strikethrough reference<sup>32-47</sup></s> and <s>strikethrough reference<sub>32-47</sub></s></p>

<p><small>This tests <u>underline</u> and <s>strikethrough</s> when they are <s><u>used together</u></s> as they both use text-decoration</small></p>


<p><small>Repeated in small: This is reference<sup>32-47</sup> and <u>underlined reference<sup>32-47</sup></u> then reference<sub>32-47</sub> and <u>underlined reference<sub>32-47</sub></u> but out of span again but <font color="#000088">blue</font> font and <acronym>ACRONYM</acronym> text</small></p> 

<p style="font-size:7pt;"><big>Repeated in BIG but with font-size set to 7pt by in-line css: This is reference<sup>32-47</sup> and <u>underlined reference<sup>32-47</sup></u> then reference<sub>32-47</sub> and <u>underlined reference<sub>32-47</sub></u> but out of span again but <font color="#000088">blue</font> font and <acronym>ACRONYM</acronym> text</big></p>

<ol>
<li>Item <b><u>1</u></b></li>
<li>Item 2<sup>32</sup></li>
<li><small>Item</small> 3</li>
<li>Praesent pharetra nulla in turpis. Sed ipsum nulla, sodales nec, vulputate in, scelerisque vitae, magna. Sed egestas justo nec ipsum. Nulla facilisi. Praesent sit amet pede quis metus aliquet vulputate. Donec luctus. Cras euismod tellus vel leo. 
<ul>
<li>Praesent pharetra nulla in turpis. Sed ipsum nulla, sodales nec, vulputate in, scelerisque vitae, magna. Sed egestas justo nec ipsum. Nulla facilisi. Praesent sit amet pede quis metus aliquet vulputate. Donec luctus. Cras euismod tellus vel leo. </li>
<li>Subitem 2
<ul>
<li>
Level 3 subitem
</li>
</ul>
</li>
</ul>
</li>
<li>Item 5</li>
</ol>

<dl>
<dt>Definition list</dt>
<dd>List defined by DL, DD and DT tags</dd>
</dl>

<p>Sed bibendum. Nunc eleifend ornare velit. Sed consectetuer urna in erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris sodales semper metus. Maecenas justo libero, pretium at, malesuada eu, mollis et, arcu. Ut suscipit pede in nulla. Praesent elementum, dolor ac fringilla posuere, elit libero rutrum massa, vel tincidunt dui tellus a ante. Sed aliquet euismod dolor. Vestibulum sed dui. Duis lobortis hendrerit quam. Donec tempus orci ut libero. Pellentesque suscipit malesuada nisi. </p>

<table border="1">
<thead>
<tr>
<th>Data</th>
<td>Data</td>
<td>Data</td>
<td>Data<br />2nd line</td>
</tr>
</thead>
<tbody>
<tr>
<th>More Data</th>
<td>More Data</td>
<td>More Data</td>
<td>Data<br />2nd line</td>
</tr>
<tr>
<th>Data</th>
<td>Data</td>
<td>Data</td>
<td>Data<br />2nd line</td>
</tr>
<tr>
<th>Data</th>
<td>Data</td>
<td>Data</td>
<td>Data<br />2nd line</td>
</tr>
</tbody>
</table>

<p>Praesent pharetra nulla in turpis. Sed ipsum nulla, sodales nec, vulputate in, scelerisque vitae, magna. Sed egestas justo nec ipsum. Nulla facilisi. Praesent sit amet pede quis metus aliquet vulputate. Donec luctus. Cras euismod tellus vel leo. Cras tellus. Fusce aliquet. Curabitur tincidunt viverra ligula. Fusce eget erat. Donec pede. Vestibulum id felis. Phasellus tincidunt ligula non pede. Morbi turpis. In vitae dui non erat placerat malesuada. Mauris adipiscing congue ante. Proin at erat. Aliquam mattis. </p>

<form>

<b>Textarea</b>
<textarea name="authors" rows="5" cols="80" wrap="virtual">Quisque viverra. Etiam id libero at magna pellentesque aliquet. Nulla sit amet ipsum id enim tempus dictum. Quisque viverra. Etiam id libero at magna pellentesque aliquet. Nulla sit amet ipsum id enim tempus dictum. Quisque viverra. Etiam id libero at magna pellentesque aliquet. Nulla sit amet ipsum id enim tempus dictum. Quisque viverra. Etiam id libero at magna pellentesque aliquet. Nulla sit amet ipsum id enim tempus dictum. Quisque viverra. Etiam id libero at magna pellentesque aliquet. Nulla sit amet ipsum id enim tempus dictum. Quisque viverra. Etiam id libero at magna pellentesque aliquet. Nulla sit amet ipsum id enim tempus dictum. Quisque viverra. Etiam id libero at magna pellentesque aliquet. Nulla sit amet ipsum id enim tempus dictum. Quisque viverra. Etiam id libero at magna pellentesque aliquet. Nulla sit amet ipsum id enim tempus dictum. </textarea>
<br /><br />

<b>Select</b>
<select size="1" name="status"><option value="A">Active</option><option value="W" >New item from auto_manager: pending validation</option><option value="I" selected="selected">Incomplete record - pending</option><option value="X" >Flagged for Deletion</option> </select> followed by text
<br /><br />



<b>Input Radio</b>
<input type="radio" name="pre_publication" value="0" checked="checked" > No &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="pre_publication" value="1" > Yes 
<br /><br />


<b>Input Radio</b>
<input type="radio" name="recommended" value="0" > No &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="recommended" value="1" > Keep &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="recommended" value="2"  checked="checked" > Choice 
<br /><br />


<b>Input Text</b>
<input type="text" size="190" name="doi" value="10.1258/jrsm.100.5.211"> 
<br /><br />

<b>Input Password</b>
<input type="password" size="40" name="password" value="secret"> 
<br /><br />


<input type="checkbox" name="QPC" value="ON" > Checkboxes<br>
<input type="checkbox" name="QPA" value="ON" > Not selected<br>
<input type="checkbox" name="QLY" value="ON" checked="checked" > Selected<br>
<input type="checkbox" name="QLY" value="ON" disabled="disabled" > Disabled
<br /><br />

<input type="submit" name="submit" value="Submit" /> 
<input type="image" name="submit" src="goto.gif" />
<input type="button" name="submit" value="Button" />
<input type="reset" name="submit" value="Reset" />

</form>

';

$teoHTML ='<div style="text-align: center;"><b><span style="font-size: 14pt;">Μια φωτογραφία &ndash; δυό όψεις</span></b></div><div style="text-align: justify;">&nbsp;</div><div style="text-align: right;"><i><span style="font-family: \'Palatino Linotype\',\'serif\';">Ο πιο μεγάλος πόνος δεν αλλάζε σε δόξα</span></i></div><div style="text-align: right;"><i><span style="font-family: \'Palatino Linotype\',\'serif\';">δεν γίνεται τσίρκο και αγορά</span></i></div><div style="text-align: justify;"><b>&nbsp;</b></div><div style="text-align: right;"><span style="font-family: \'Palatino Linotype\',\'serif\';">Θανάσης Κωσταβἀρας</span></div><div style="text-align: justify;"><b><span style="font-family: \'Palatino Linotype\',\'serif\';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</span></b></div><div style="text-align: justify;"><span style="font-size: 14px;"><span style="font-family: \'Palatino Linotype\';"><strong><span style="font-weight: normal;">Στίς 12 Φεβρουαρίου 2011 η πολυβραβευμένη&nbsp;νοτιοα- φρικάνα φωτογράφος Τζόντι Μπίμπερ κέρδισε </span></strong>το βραβείο World Press Photo<strong><span style="font-weight: normal;"> για την φωτογραφία της Αϊσά Μπίμπι, </span></strong>μιας νεαρής Αφγανής που κακοποι- ήθηκε από τον σύζυγό της. Το συγκλονιστικό πορτρέ- το έγινε εξώφυλλο σ<strong><span style="font-weight: normal;">το περιοδικό TIME.&nbsp;</span></strong>Η δεκαοκτά- χρονη εγκατέλειψε τον άντρα της επειδή την κακοποι- ούσε, εκείνος κατέφυγε στο διοικητή των Ταλιμπάν και μετά από συνοπτικές διαδι- κασίες η ποινή που ορίστηκε ήταν να της κόψουν τη μύτη και τα αυτιά. Η φωτογρα- φία είναι απροκάλυπτα σκληρή! </span></span></div><div style="text-align: justify;"><span style="font-size: 14px;"><span style="font-family: \'Palatino Linotype\';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ο δυτικός κόσμος αντιλαμβάνεται και χειρίζεται το θέμα της οδύνης με συγκεκριμένο τρόπο&middot; εξοβελίζει τον πόνο, την αρρώστια, τα γηρατειά, θεοποιεί την ομορφιά και την νεότητα, και καταλήγει στην ψυχαναγκαστική επιδίωξη-κυνήγι της ευτυχίας. Αν αθροίσουμε τα παραπάνω θα καταλάβουμε γιατί βράβευσαν την συγκεκριμένη φωτογραφία, η οποία τολμάει να προβάλει κάτι που σε άλλη περίπτωση θα έπρεπε να κρυφτεί. Όμως στη Δύση υπάρχει εαισθησία για την προστασία των προσωπικών δεδομένων του ατόμου. Τώρα τί καινούργιο συνέβη ξαφνικά και δεν τηρήθηκε αυτή η αρχή; Οι Ταλιμπάν είχαν αυτές τις συμπεριφορές στο γυναικείο πληθυσμό απ&rsquo; όταν ήταν σύμμαχοι των Αμερικάνων έναντι των Ρώσων, γιατί κανείς δεν ευαισθητοποιήθηκε τότε; Βέβαια είναι πολύ σημαντικό το θέμα που αναδεικνύεται μέσω της φωτογραφίας,&nbsp;μόνο που δεν είναι ούτε σημερινό ούτε καινούργιο, και πάντως δεν πρέπει να παραμερίζει. κάνοντας αόρατους, τους λόγους για τους οποίους βρίσκεται εκεί ο Αμερικανικός στρατός. </span></span></div><div style="text-align: justify;"><span style="font-size: 14px;"><span style="font-family: \'Palatino Linotype\';">Η επίδειξη, κατ&rsquo; αυτό τον τρόπο, του προσωπικού δράματος, έστω για την ανάδειξη ενός γενικότερου προβλήματος, δεν συνάδει με τον οφειλόμενο, σε κάθε άνθρωπο, σεβασμό. Ακόμα κι αν συναίνεσε το κορίτσι για τη φωτογράφιση, η νηφάλια φωτογράφος όφειλε να την προστατεύσει. Με ενοχλεί πολύ η σκέψη πως η <strong><span style="font-weight: normal;">Τζόντι Μπίμπερ μετά το τέλος της απονομής και </span></strong>έχοντας προσθέσει το ένατο βραβείο στη συλλογή της,<strong><span style="font-weight: normal;"> γύρισε στη ζεστή θαλπωρή του σπιτιού και της ζωής της ψυχικά αλώβητη. Έχω την αίσθηση πως η Αϊσά έγινε για πολλοστή φορά θύμα, χρυσωμένο ίσως, αλλά θύμα και μάλιστα μ&rsquo; έναν ύπουλο, αθέατο τρόπο.</span></strong></span></span></div><div style="text-align: justify;"><span style="font-size: 14px;"><span style="font-family: \'Palatino Linotype\';">Σκέψεις του τύπου &laquo;η βία και η ομορφιά&raquo; που συνόδεψαν τη φωτογραφία είναι κατά την γνώμη μου υποκριτικές.Και βέβαια δεν είναι τυχαίο ότι το στήσιμό της, θυμίζει μια παρόμοια φωτογραφία του SteveMcCurry με την εμβληματική πλέον πρασινομάτα -Αφγανή κι αυτή- πιτσιρίκα που έγινε εξώφυλλο στο ΝationalGeographic, διευκολύ- νοντάς μας έτσι στην πρόσληψη της νέας. </span></span></div><div style="text-align: justify;"><span style="font-size: 14px;"><span style="font-family: \'Palatino Linotype\';">Η μαρτυριάρικη δύναμη των συνειρμών αφήνει τις όποιες πιθανές αγαθές προθέσεις της φωτογράφου και των κριτών του διαγωνισμού να επιπολάζουν προκλητικά.</span></span></div><div style="text-align: justify;"><span style="font-size: 14px;"><span style="font-family: \'Palatino Linotype\';">Η συγκεκριμένη κοπέλα διασώθηκε και τώρα ζει στην Αμερική. Παρ΄ όλο που της έγινε πλαστική στη μύτη,&nbsp;πέρασε ένα μεγάλο διάστημα κατάθλιψης Η Αϊσά σώθηκε! Σωματικά τουλάχιστον. Δυστυχώς υπάρχουν πάρα πολλές γυναίκες που δεν θα <i>σωθούν</i>, θα περάσουν την ζωή τους μέσα στη ταπείνωση και τα βασανιστήρια που τις υποβάλλουν οι συμπλεγματικοί σύζυγοι-εξουσιαστές τους, που συχνά γίνονται οι ίδιοι δήμιοι χωρίς καν το πρόσχημα-επίκληση του νόμου των Ταλιμπάν. Οι γυναίκες αυτές ξεκινούν τη ζωή τους με τον πρώτο ακρωτηριασμό, 150 εκατομμύρια, σύμφωνα με τα στατιστικά στοιχεία της Παγκόσμιας Οργάνωσης Υγείας έχουν υποστεί κλειτοριδεκτομή, δυνητικά ακολουθούν κι άλλοι: μύτες, αφτιά, δάχτυλα, χέρια, ή ακόμη διαπόμπευση, λιθοβολισμός, θάνατος. Δεν ορίζουν τη ζωή τους, ούτε το σώμα τους, δεν ορίζουν καν το φυλακισμένο &mdash;πίσω από το ιδιωτικό κελί της μπούργκας&mdash; βλέμμα τους! Αυτά στην Ανατολή. </span></span></div><div style="text-align: justify;"><span style="font-size: 14px;"><span style="font-family: \'Palatino Linotype\';">Και η Δύση, τι κάνει για όλα αυτά; Τι μπορεί να κάνει; Κάνει ρεπορτάζ, γράφει άρθρα, κάνει κριτική. Άντε, βγάζει και μερικές&nbsp;φωτογραφίες. Ε, μέχρις εκεί.&nbsp;</span></span></div><div style="text-align: justify;"><span style="font-size: 14px;"><span style="font-family: \'Palatino Linotype\';">Ναι υπήρξαν φωτογραφίες που έπαιξαν ρόλο μάλιστα κάποτε και σημαντικό, όπως η πολύ γνωστή του NickUt το 1972 με την μικρή φλεγόμενη Βιετναμέζα που απομένοντας γυμνή τρέχει μαζί με άλλα παιδιά κυνηγημένη από τις φλόγες που σκόρπισε ένα αμερικανικό μαχητικό αεροπλάνο, ή την επίσης συγκλονιστική του EddieAdams το 1968 που αποτυπώνει την εν ψυχρώ δολοφονία ενός αντάρτη Βιετγκόνγκ στη Σαϊγκόν (ο Adams τότε κέρδισε ένα Πούλιτζερ, επηρεάστηκε όμως τόσο που άλλαξε επάγγελμα). </span></span></div><div style="text-align: justify;"><span style="font-size: 14px;"><span style="font-family: \'Palatino Linotype\';">Εκείνες έκαναν ορατή την βαρβαρότητα της Δύσης, αυτή&nbsp;αναδεικνύει την βαρβαρότητα των Ταλιμπάν (κολακεύοντας εμμέσως τις δυτικές πολιτισμικές αξίες). Εκείνες βοήθησαν ένα πόλεμο να τερματιστεί μια ώρα αρχύτερα&middot; ετούτη μάλλον βοηθά έναν αδιαφανή πόλεμο &ndash;που πάντως δεν γίνεται για τα δικαιώματα αυτών των γυναικών&ndash; να συνεχιστεί.</span></span></div><div style="text-align: justify;"><span style="font-size: 14px;"><span style="font-family: \'Palatino Linotype\';">&nbsp;</span></span></div><div style="text-align: justify;">&nbsp;</div><div style="text-align: justify;">&nbsp;</div><p>&nbsp;</p>';


//==============================================================
//==============================================================
//==============================================================

include("../mpdf.php");

$mpdf=new mPDF(); 

//$mpdf->WriteHTML($html);
$mpdf->WriteHTML($teoHTML);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?>