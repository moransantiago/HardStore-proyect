ill always be lower case</span>
</pre></div>
</div>
</div>
<div class="section" id="passing-parameters-when-initializing-your-class">
<h2>Passing Parameters When Initializing Your Class<a class="headerlink" href="#passing-parameters-when-initializing-your-class" title="Permalink to this headline">Â¶</a></h2>
<p>In the library loading method you can dynamically pass data as an
array via the second parameter and it will be passed to your class
constructor:</p>
<div class="highlight-ci"><div class="highlight"><pre><span></span><span class="nv">$params</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s1">&#39;type&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;large&#39;</span><span class="p">,</span> <span class="s1">&#39;color&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;red&#39;</span><span class="p">);</span>

<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">load</span><span class="o">-&gt;</span><span class="na">library</span><span class="p">(</span><span class="s1">&#39;someclass&#39;</span><span class="p">,</span> <span class="nv">$params</span><span class="p">);</span>
</pre></div>
</div>
<p>If you use this feature you must set up your class constructor to expect
data:</p>
<div class="highlight-ci"><div class="highlight"><pre><span></span><span class="o">&lt;?</span><span class="nx">php</span> <span class="nb">defined</span><span class="p">(</span><span class="s1">&#39;BASEPATH&#39;</span><span class="p">)</span> <span class="k">OR</span> <span class="k">exit</span><span class="p">(</span><span class="s1">&#39;No direct script access allowed&#39;</span><span class="p">);</span>

<span class="k">class</span> <span class="nc">Someclass</span> <span class="p">{</span>

        <span class="k">public</span> <span class="k">function</span> <span class="nf">__construct</span><span class="p">(</span><span class="nv">$params</span><span class="p">)</span>
        <span class="p">{</span>
                <span class="c1">// Do something with $params</span>
        <span class="p">}</span>
<span class="p">}</span>
</pre></div>
</div>
<p>You can also pass parameters stored in a config file. Simply create a
config file named identically to the class file name and store it in
your <em>application/config/</em> directory. Note that if you dynamically pass
parameters as described above, the config file option will not be
available.</p>
</div>
<div class="section" id="utilizing-codeigniter-resources-within-your-library">
<h2>Utilizing CodeIgniter Resources within Your Library<a class="headerlink" href="#utilizing-codeigniter-resources-within-your-library" title="Permalink to this headline">Â¶</a></h2>
<p>To access CodeIgniterâ€™s native resources within your library use the
<code class="docutils literal"><span class="pre">get_instance()</span></code> method. This method returns the CodeIgniter super
object.</p>
<p>Normally from within your controller methods you will call any of the
available CodeIgniter methods using the <code class="docutils literal"><span class="pre">$this</span></code> construct:</p>
<div class="highlight-ci"><div class="highlight"><pre><span></span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">load</span><span class="o">-&gt;</span><span class="na">helper</span><span class="p">(</span><span class="s1">&#39;url&#39;</span><span class="p">);</span>
<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">load</span><span class="o">-&gt;</span><span class="na">library</span><span class="p">(</span><span class="s1">&#39;session&#39;</span><span class="p">);</span>
<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">config</span><span class="o">-&gt;</span><span class="na">item</span><span class="p">(</span><span class="s1">&#39;base_url&#39;</span><span class="p">);</span>
<span class="c1">// etc.</span>
</pre></div>
</div>
<p><code class="docutils literal"><span class="pre">$this</span></code>, however, only works directly within your controllers, your
models, or your views. If you would like to use CodeIgniterâ€™s classes
from within your own custom classes you can do so as follows:</p>
<p>First, assign the CodeIgniter object to a variable:</p>
<div class="highlight-ci"><div class="highlight"><pre><span></span><span class="nv">$CI</span> <span class="o">=&amp;</span> <span class="nx">get_instance</span><span class="p">();</span>
</pre></div>
</div>
<p>Once youâ€™ve assigned the object to a variable, youâ€™ll use that variable
<em>instead</em> of <code class="docutils literal"><span class="pre">$this</span></code>:</p>
<div class="highlight-ci"><div class="highlight"><pre><span></span><span class="nv">$CI</span> <span class="o">=&amp;</span> <span class="nx">get_instance</span><span class="p">();</span>

<span class="nv">$CI</span><span class="o">-&gt;</span><span class="na">load</span><span class="o">-&gt;</span><span class="na">helper</span><span class="p">(</span><span class="s1">&#39;url&#39;</span><span class="p">);</span>
<span class="nv">$CI</span><span class="o">-&gt;</span><span class="na">load</span><span class="o">-&gt;</span><span class="na">library</span><span class="p">(</span><span class="s1">&#39;session&#39;</span><span class="p">);</span>
<span class="nv">$CI</span><span class="o">-&gt;</span><span class="na">config</span><span class="o">-&gt;</span><span class="na">item</span><span class="p">(</span><span class="s1">&#39;base_url&#39;</span><span class="p">);</span>
<span class="c1">// etc.</span>
</pre></div>
</div>
<div class="admonition note">
<p class="first admonition-title">Note</p>
<p>Youâ€™ll notice that the above <code class="docutils literal"><span class="pre">get_instance()</span></code> function is being
passed by reference:</p>
<div class="highlight-ci"><div class="highlight"><pre><span></span><span class="nv">$CI</span> <span class="o">=&amp;</span> <span class="nx">get_instance</span><span class="p">();</span>
</pre></div>
</div>
<p class="last">This is very important. Assigning by reference allows you to use the
original CodeIgniter object rather than creating a copy of it.</p>
</div>
<p>However, since a library is a class, it would be better if you
take full advantage of the OOP principles. So, in order to
be able to use the CodeIgniter super-object in all of the class
methods, youâ€™re encouraged to assign it to a property instead:</p>
<div class="highlight-ci"><div class="highlight"><pre><span></span><span class="k">class</span> <span class="nc">Example_library</span> <span class="p">{</span>

        <span class="k">protected</span> <span class="nv">$CI</span><span class="p">;</span>

        <span class="c1">// We&#39;ll use a constructor, as you can&#39;t directly call a function</span>
        <span class="c1">// from a property definition.</span>
        <span class="k">public</span> <span class="k">function</span> <span class="nf">__construct</span><span class="p">()</span>
        <span class="p">{</span>
                <span class="c1">// Assign the CodeIgniter super-object</span>
                <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">CI</span> <span class="o">=&amp;</span> <span class="nx">get_instance</span><span class="p">();</span>
        <span class="p">}</span>

        <span class="k">public</span> <span class="k">function</span> <span class="nf">foo</span><span class="p">()</span>
        <span class="p">{</span>
                <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">CI</span><span class="o">-&gt;</span><span class="na">load</span><span class="o">-&gt;</span><span class="na">helper</span><span class="p">(</span><span class="s1">&#39;url&#39;</span><span class="p">);</span>
                <span class="nx">redirect</span><span class="p">();</span>
        <span class="p">}</span>

        <span class="k">public</span> <span class="k">function</span> <span class="nf">bar</span><span class="p">()</span>
        <span class="p">{</span>
                <span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">CI</span><span class="o">-&gt;</span><span class="na">config</span><span class="o">-&gt;</span><span class="na">item</span><span class="p">(</span><span class="s1">&#39;base_url&#39;</span><span class="p">);</span>
        <span class="p">}</span>

<span class="p">}</span>
</pre></div>
</div>
</div>
<div class="section" id="replacing-native-libraries-with-your-versions">
<h2>Replacing Native Libraries with Your Versions<a class="headerlink" href="#replacing-native-libraries-with-your-versions" title="Permalink to this headline">Â¶</a></h2>
<p>Simply by naming your class files identically to a native library will
cause CodeIgniter to use it instead of the native one. To use this
feature you must name the file and the class declaration exactly the
same as the native library. For example, to replace the native Email
library youâ€™ll create a file named <em>application/libraries/Email.php</em>,
and declare your class with:</p>
<div class="highlight-ci"><div class="highlight"><pre><span></span><span class="k">class</span> <span class="nc">CI_Email</span> <span class="p">{</span>

<span class="p">}</span>
</pre></div>
</div>
<p>Note that most native classes are prefixed with CI_.</p>
<p>To load your library youâ€™ll see the standard loading method:</p>
<div class="highlight-ci"><div class="highlight"><pre><span></span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">load</span><span class="o">-&gt;</span><span class="na">library</span><span class="p">(</span><span class="s1">&#39;email&#39;</span><span class="p">);</span>
</pre></div>
</div>
<div class="admonition note">
<p class="first admonition-title">Note</p>
<p class="last">At this time the Database classes can not be replaced with
your own versions.</p>
</div>
</div>
<div class="section" id="extending-native-libraries">
<h2>Extending Native Libraries<a class="headerlink" href="#extending-native-libraries" title="Permalink to this headline">Â¶</a></h2>
<p>If all you need to do is add some functionality to an existing library -
perhaps add a method or two - then itâ€™s overkill to replace the entire
library with your version. In this case itâ€™s better to simply extend the
class. Extending a class is nearly identical to replacing a class with a
couple exceptions:</p>
<ul class="simple">
<li>The class declaration must extend the parent class.</li>
<li>Your new class name and filename must be prefixed with MY_ (this
item is configurable. See below.).</li>
</ul>
<p>For example, to extend the native Email class youâ€™ll create a file named
<em>application/libraries/MY_Email.php</em>, and declare your class with:</p>
<div class="highlight-ci"><div class="highlight"><pre><span></span><span class="k">class</span> <span class="nc">MY_Email</span> <span class="k">extends</span> <span class="nx">CI_Email</span> <span class="p">{</span>

<span class="p">}</span>
</pre></div>
</div>
<p>If you need to use a constructor in your class make sure you
extend the parent constructor:</p>
<div class="highlight-ci"><div class="highlight"><pre><span></span><span class="k">class</span> <span class="nc">MY_Email</span> <span class="k">extends</span> <span class="nx">CI_Email</span> <span class="p">{</span>

        <span class="k">public</span> <span class="k">function</span> <span class="nf">__construct</span><span class="p">(</span><span class="nv">$config</span> <span class="o">=</span> <span class="k">array</span><span class="p">())</span>
        <span class="p">{</span>
                <span class="k">parent</span><span class="o">::</span><span class="na">__construct</span><span class="p">(</span><span class="nv">$config</span><span class="p">);</span>
                <span class="c1">// Your own constructor code</span>
        <span class="p">}</span>

<span class="p">}</span>
</pre></div>
</div>
<div class="admonition note">
<p class="first admonition-title">Note</p>
<p class="last">Not all of the libraries have the same (or any) parameters
in their constructor. Take a look at the library that youâ€™re
extending first to see how it should be implemented.</p>
</div>
<div class="section" id="loading-your-sub-class">
<h3>Loading Your Sub-class<a class="headerlink" href="#loading-your-sub-class" title="Permalink to this headline">Â¶</a></h3>
<p>To load your sub-class youâ€™ll use the standard syntax normally used. DO
NOT include your prefix. For example, to load the example above, which
extends the Email class, you will use:</p>
<div class="highlight-ci"><div class="highlight"><pre><span></span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">load</span><span class="o">-&gt;</span><span class="na">library</span><span class="p">(</span><span class="s1">&#39;email&#39;</span><span class="p">);</span>
</pre></div>
</div>
<p>Once loaded you will use the class variable as you normally would for
the class you are extending. In the case of the email class all calls
will use:</p>
<div class="highlight-ci"><div class="highlight"><pre><span></span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">email</span><span class="o">-&gt;</span><span class="na">some_method</span><span class="p">();</span>
</pre></div>
</div>
</div>
<div class="section" id="setting-your-own-prefix">
<h3>Setting Your Own Prefix<a class="headerlink" href="#setting-your-own-prefix" title="Permalink to this headline">Â¶</a></h3>
<p>To set your own sub-class prefix, open your
<em>application/config/config.php</em> file and look for this item:</p>
<div class="highlight-ci"><div class="highlight"><pre><span></span><span class="nv">$config</span><span class="p">[</span><span class="s1">&#39;subclass_prefix&#39;</span><span class="p">]</span> <span class="o">=</span> <span class="s1">&#39;MY_&#39;</span><span class="p">;</span>
</pre></div>
</div>
<p>Please note that all native CodeIgniter libraries are prefixed with CI_
so DO NOT use that as your prefix.</p>
</div>
</div>
</div>


          </div>
          <footer>
  
    <div class="rst-footer-buttons" role="navigation" aria-label="footer navigation">
      
        <a href="drivers.html" class="btn btn-neutral float-right" title="Using CodeIgniter Drivers">Next <span class="fa fa-arrow-circle-right"></span></a>
      
      
        <a href="libraries.html" class="btn btn-neutral" title="Using CodeIgniter Libraries"><span class="fa fa-arrow-circle-left"></span> Previous</a>
      
    </div>
  

  <hr/>

  <div role="contentinfo">
    <p>
        &copy; Copyright 2014 - 2019, British Columbia Institute of Technology.
      Last updated on Jan 16, 2019.
    </p>
  </div>

  Built with <a href="http://sphinx-doc.org/">Sphinx</a> using a <a href="https://github.com/snide/sphinx_rtd_theme">theme</a> provided by <a href="https://readthedocs.org">Read the Docs</a>.
  
</footer>
        </div>
      </div>

    </section>

  </div>
  


  

    <script type="text/javascript">
        var DOCUMENTATION_OPTIONS = {
            URL_ROOT:'../',
            VERSION:'3.1.10',
            COLLAPSE_INDEX:false,
            FILE_SUFFIX:'.html',
            HAS_SOURCE:  false
        };
    </script>
      <script type="text/javascript" src="../_static/jquery.js"></script>
      <script type="text/javascript" src="../_static/underscore.js"></script>
      <script type="text/javascript" src="../_static/doctools.js"></script>

  

  
  
    <script type="text/javascript" src="../_static/js/theme.js"></script>
  

  
  
  <script type="text/javascript">
      jQuery(function () {
          SphinxRtdTheme.StickyNav.enable();
      });
  </script>
   

</body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    °•í»öÿ«ıK½ ÿ³¦şß×ûÿÚŠıï4Úÿ×û_PrúÎ.éQöõwWº¬ïôñsEß9öÙ¤ïN™é;ø9¡ïü¤ŒsúÎğmvô3––ˆ¾s×Q×ô­WXÓw>ÙÄ®ï<»ÉBßy´«ï¬¼¥°¾³k7÷ë;9Öô_ş`Oß™ùÖw~üƒAß™À®ï<³ÑTßy#©tè;·,pTß™¶ç¥Ówn§Øô§~ñ}§Ï\ëúÎş¾.ê;?O)%úÎ¤¼PßYy©§õoÌ¶®ïÅuAß¹ş[õÿm.’¾óüÎè;÷¤XÓwÖK¶­ï,›\‚úÎ~Ÿ:©ïl>§kC»¤ï|Qå„¾ó½£/³¾3d‹}gÇıÅ©ï\\²úÎêÉfúÎœïÜ«ï¬‘È¢ï˜YÓE°¨húÎ£Ï£ìë;}S_N}çóM–úÎğ=Å ïLTAßùÎ:[úÎÆ*ûúÎ
ªÒ¦ïü@é¸¾óp’óúÎç‰ë;%•¨¾3&/Êu}ç?O¢Ü©ïìù©Q‡˜·ÓãúÎ^Ÿ1úÎÆkÜ¬ï¼“U$}ç‚Ü(·ê;_(¸®ùÙãúÎü$FßùÇ7^£ïôJê;'}êUúÎÇº–"}g‡ÖwŞÜnWß™¾İ5}çÂí^«ï|ôo×Ò¥ï¬'s¯¾³Ş²×úÎÖwŞŸñZßùrê;•sôúNMûúÎ†‹XôåYÓw.©b¡ïôè¼¾³Îb6}§JUúÎO?·É~±À9½ÚÊ®ëÕvÄÚÓ«­RK«b‹Cß9%Ù&w(çğğ«ä:kÚÛÃcñÿ ™í‹ÙÖÿ~æ‚Š ÿmgWÿ;éÛ}ÚÖÿ’Îá±_ı¯È®şwÒÿŠŠCÿÛQe[ÿ›äšş·bQô¿1æúß‘ş7¦õ¿ÍØÖÿ~êä|áAÿÛÖ®şw Òÿ¶-QıoEÊıï|{úßXş÷Ù8ƒş·Ûô¿SŒúß‘&|×úoE[ñ3ú¯´¥‡İ:Şp¥A;±u¡[ÕÃÆÛ×Ãn¢ŸLÖõû]ë#«zX7ñÛ~S±óÛ¦%²ñÛè^Ào«hä·}ue+¿íya~Û5•ß&“ëùm+†GYÑëÂ¾5%v™ò¾˜<G¿Ò3ëu×&¦È"af¬­ß]›áË<SŸ–Ñ‘·¯¥Å÷zğL”—èúŠÖ}+auo2‡¹	¼ÉOö1–×6ªd×
+™Ék«jºğaôËmáIôu£~ÙüâŒ‰õà‘¾zí²A¡ç3]bÈc(è>¼3_«î‰ïÇ!uåê7Ì´µ!#$,±¥ÉT³Däy†è Y2®j¯Ã7z²YP>h”Æ‘>bJ™ï×Åh¶4{Ö3¢9Æ
šfbX#L•ÁØß“—bÑMYL°Ú¸±ÜÉÙ+“Nœ„’©QĞ›‡bîúìÉAÎë³øÈóúì_ù:Ç/a}vK¾™]I`ÕgluZŸ»V¯Ï¾ò?+úl÷é“¨ÿ2›µşK]oĞçpLê¿\`÷Ÿ=&Z©ÿ’d¬ÿ2ÑPÿep!ÿ©»?×Ã’ıši9Hÿ^ÃtÊsÍFåóà}ªÏçQ7Ù|ı¦Î„flE ™áo¸H\ä]<Ê#r€ÚŒ}€"/hV+¸‚„šÈCûşÃ>4Cxj"5ÒóûDi÷2$ô MJæèîÕ1z«¼›–ÈˆÛÁP‡Æ¥Ğµ‡Ã/'òK9ğ…DÌM_- g¯­Õpyª#OAseHÄt1áğÉß†¡³äï”¿6§ùó#tCäá‡¾«›ñİ¤´‰ïÀÁ·AoøJeøxhßMğkºÎ·nÄwñ@OáK$ÚÄ7šGğMïiß»	øø×:¾¾‡W»ß&<…/=Ï&¾«>ñ¾#zØÀWõ±¾/î[Ç7ù‡Aß¸ß3ı=…oÒ\›ø¶
ø~ïv|Ëv·oã‰ø~}Ï¾ŠôÚgUapë7Ì\®ù8z|úy
ß°96ñ½:Ù#ö»!Ş¾§Æ[àÛê®uûÍDşaõJ7Úo¥¾Â7s–M|gÊ=‚o‡®6ğ7Îß+ëøöEş¡í
7âûSoOá;r¦M|kË<‚ï-©|+ŒµÀwFõá{m™ñíŞËSøòfØ<ÿJlÅ¿£-ã_µu|Ãpüû•;ãß‹§Ù?öÈúÖ ³­øw”eü{ÛúúC×ûÒ½ëÛâî‹?±ÿNğLü+¶ÿ~dÿŞ²n¿8ş]âÎø·›Çâß)¶ãßñ‰	[ñïËø÷†ÿ€ğô…;ãß®‹'ÛÇyß²mÅ¿Ã-ãß¬ã‹Z@k?w#¾	]¬áÛ—_³üU>…óWÉõù«Bõù«Lãß1€oUK|©şÁôÚëLÏ	ª}rˆ¨ã´tñhFÓv”Ÿx‰‹õ=ˆMøÔö!rx2’ûJT;6á“¥à„Q~ì`°HÊãâû¤à'¹1<_¾R4oTst@˜„ÙW¬8˜ò-¾/÷+fG­Úó-‡‘n¯óa‰UK“¾eDêäÀ5bR‰ĞëÚ3Ú1ÿ}™„ŒÊeß27í‘È]L®Bo%ªq)Ù—'!gBg®‰çŞæ`ªj˜šLoÄ)Òãà_Ôª „e9BÑšÈeÔßL†Fm|sÌ¯‡®ácp‡;bn¥T™ËWnåU¾bªg(\Ÿ©IvÈ‚	ÕÌ´X	WSÌLáÈx¸Ş§’Ñäƒm£“VE–ñ™S¯ÂS!kƒ‰–Ëæ`iìt ‚êìDxFt°PñSø®ïTôx+?Q¥»ßÍCr¦ò’Öóà°™”<Ó @ç+pñmÒ¾&¶œÌa°º#z’¡Ç‹ŸØŞ2ß"Ù¹„
SZ4aµêJ¦z”¿,ß¨ËÆØ°<õ(|‹:g¯ÜŠîp£¹úÀ>óX‰täè3
Ğpş+A?`xZÌîë~yõAú|ˆ„Åù ‘¿âä—ó?l¿²ˆcH~F`²V‘£3²Œ®ºj‚LFíWË1%ë`Ø=¸;Il¾ê8è"½=f[CD£UíÃçGœ×'ğ““$Í—ô„NQVŸW»ìö5?¶çN}„D™VıÁâ¿Lüsƒ»„.á/£K8ë¼Kàøè]B®M—pÑÂ%ì(&—°ä¨M—Pİ—ĞÓèö9à¢æš¹„wæš»„Ø%TaN¢g£½˜ù…Ë~a©3~aXa¿`xÊŒçUäZ˜û‡îÿ@èüCŒÎ?”±ô1VıÃÿLüÃıÃT½˜à‚Èîí¼¨dáÆ™ø‡˜.FÿĞù‡Es`ö½eá¾O7ø‡®Üì¬ÄÏÇÚó[‡ÚŒş4‹"°s¨ıÙ«/LI)Îx¡úL3çPnæëx¡dâ…¬îî":YÄ³gX‰V¤üAÛv4#íùƒUƒlÆCÎ›Å¹ºx¡ÜüW!^v 8ã…²Ÿ˜¹„'S_Ç^/ìèâŞx!¨ƒE¼0hª•xaÚ!ƒ¨ÓÆóşá×aöüÃÌlú‡vgÌıƒ~?‘3÷Uğ±{ŠÓ?Ü’™ù‡²×şÁüCr'÷ú‡"ÿĞVfÅ?ôßgğÚhÏû‡ÛóûØôõ~3ó}õşáÄÌWÁ?„î,Nÿ>ÑÌ?ü2ñµğÿ0±ƒ{ıCVkÿPg¢ÿĞb·Á?\zŞ?Pìù‡Ö=lúŸfşaŞ?|ÿÉ«àüv§Ø0ÖÌ?|5öµğÿßÎ½şaG´…Ğ±âjüdğ‡#=ïÆôµçjwµé®3ó™úûŸÉ_ÿpã‡âôóGšù‡)#_û/ğmÜë’…şáÚGVüÃ³­ÿ°º±çıCçöüC~'›ş!-ÕÌ?„éã‡Ñ¿
şáèÆâô#†™ù‡>Ã^û/ğA-Üë&FZø‡ÃC­ø‡?7üÃìpÏû‡†ñvùOlú‡µÍüÃ½è4îUğë×§è0ØÌ?4üÚ?xx t¯ˆoláV²âö}gğƒŞö¼(/±ç¶³éæí5óúıÅ»£^ÿ¸º8ıCƒfş¡Ú€×şÁüCV¤{ıCD¸…˜ıÿ°â[#ÿ¡n1ğ:Úå?´±ÍØeæ6øÃ_	şÃÊbå?ô5ç?ôyí¼ÿĞØÍü‡·-ù}¬ñVùµ‹ÿĞŞ.ÿ¡…mşÃæ÷ôş!gğ+ÁøªXù=Ìù=^ûoà?„»™ÿbÉèaÿ°ÜÈÖU™,©ú›¿ug©¿9.Ìåú›ó’ó]¨¿yg>®¿y³šYıÍp.‡ëo>ı<¿pıMíú›£ÚÚ©¿ù¢n‰Ôßvs­şæÁÖêoN²×ßì!´¨¿9äM»õ7{´.\óôÕ®n¯¿ég­şæùVöêo!¸şæ­õ7;h»²Ößì.0­¿9¬jé¨¿Ù¨º£õ7ÛÅ½tõ7ßf«¿)õšú›ó*X¯¿ùç¢(×êo¾!-%õ7yÍ½°şæu=]óóòÖëoªUQÎ×ßíìÖú›ò¨"ÕßìâLıÍæRkõ7×Ö²]s~­¬¿y©²“õ7÷CAÁŞr©şæÊ™ú›Ûâ_æú›kšÛ¨¿™Ñ±8ëoV¯]²õ7—×2«¿9º‰{ëo®b©¿IÃtÙY³hõ7c“Xêo*¤/gıÍéBËú››c‹¡ş¦_"ÔßÜø¾­ú›[«Û¯¿©ª^Úêo^~Ãñú›m«:_sú×ß¼V¥Dëo¦$¡şæĞD·Öß<WÙX'rªÈãõ7ÿx“©¿¹µ‘›ëoU­şf Â½õ7gT2âãñú›3«2õ7{5ôšú›9U^Éú›*{UıMÙœÒT3½•‡ëooe·şf‡V®Õß¬ØÊkëoNšUÊêo®å¸¹şføëú›%\sBÀëú›/gıÍ2ôõ7Ç|o·şæ5Yêo~VÓZıÍ*pZ³ú›ŠB§ëoªÏV³B’¨¿™QÏf½¸Õ«·àÛò.×‹‹ø½‹zqõîpé
øO×Wü¥®M<Æ;‡ÇÑå®ã’eJ÷ üÓlx¡0>ÿEO3%€ Lmİvc9T¶)	mò“×@Ca3sXœ¯%GƒLêêàzJÏ7”ã*ª§ä·½ô{ÀäU4Gõõw˜z\»°Û?o¬ÇEıÂ2DLù*‘®W7ÉE×Ñ×ä2KZˆ.DJ³!0£MŠ&mÀS4B4Z-6ë¤{ëe¯oÔÿM¶úF™{º–|}£/¾*o¨o4e<{}£Iş…ë®c¨oÔÓ__ßhÚ¡ÖVı3–zaÖ—sº^ØôçB×{¾®œ¾^˜ßúr%[/l´Å¤û[Ê²Ö»ãt½°ô(}½°-ÿ	-ê…'ŸfÖû,|šÚe\æÓ4ç
Ÿæë¡˜O³ô±Ğ”OÓ{œ|šÍããÓ\
±Ã§ÙR ,	>ÍÍÆ®ñiÆùZãÓ¼S‰Oã[É‚OSé‘ĞŸæÈ[…ù4³÷¹ŸOÃ±Æ§éğ–=>M„ŠıÕ}ËÀ§É½ÌÎ§ñyÃ”OSå¡°Tği®€ÿpŒOó°îKÇ§¹öXÈÂ§Éñ>M“¡U>Ígc]äÓ¤†—>Í*^È§iİ³|-´Ê§Y>Ú>Í¹wÜÊ§y»r‘ø4eó…Nğièpk|šîO…6ù4Qè»’âÓ„ÎñiFª…'|q¸|šF#áÓ|ØøeæÓÄWµÁ§™Zœ|šãO…%Ê§ÃõMø45øîåÓtº+´Ï§‰¾UÓeX°H|šÇÃXø4Mß}9ù4+YòiúÕ->ÍÎ\¡ë|š>¶ø4á´öø4­Ñ÷¥ŠOCİ:Ì§¹ÿ¯Ği>MC»ç7çÓ,‚ó— ŸfâÿŠÀ§©ü?·òi!hĞó>ÂŞò8ŸFùHˆù4ÜÌ§©5¸h|šƒÜË§itßˆkV-ói?b>M×ğiVÀ${ù4ë`ByŸ&t`iâÓL®îa>MÕêvù4¹Á®ñi{-Ÿ¦ş¥ŒOÓıªĞ­|šÅå^óiJ˜OSç–ğ5Ÿæ¥äÓìRu|šš³ìói>€­]>M8 0ŸæèL>MÓKÎóiNû±ñiæ
‹Ê§1õ?/zsï Çv³ˆ,ˆ™¾fÄ‚z„ªBU?†aRAÓ@7ÏÍò »”>h+ø·¡Ë;‚ø&ñ}±ñ§!ºF'¿ÜT.?±¾B»0ª“ yøÙ–pÍÄ=	"¨("ú¼¬Ì‚šD¤şî#Uo÷-§ÉF£«Ë	EJ~’ıñOR ,C7•x°pøA£†ãŒ&jNÊzôOŠ¼N Îëì	€æİÄ9é/Ş3îw?&¢ûËV¡î/€ıqñ¯\Íb]{y\y„(7.8DLÅñdµø»qR`œdb1sİÄ´ ï8’ÿgDk-gò_Lv³ÁD.CÆLÁ¢–›óU—ğÍ­!°Gl÷ˆ}B0”Ãğƒ˜ij5¥³b¤ªOÀğó˜#çÃ¸+F³bÀ»û<ô¹ªU
sßpTMİQb2EœJÃj‘B>ˆ­›B½H¤şØŸ•P•±·E¼)º‹¿Ä’©÷Áe(îÃR‘'JÍŒÌÀ¯hx«òC”¼„}§ˆ|*JUƒ#CN­|Æğéš¡ø1	?öˆR~ì)7¯îËëËÏ‚Ÿ•Ug0‰Rt™:$ä‘b‚€+!†uT{áA½=Cß S>ˆ^ĞqQ‚–ƒøpY |ŠÃ®÷+¢ÍWÇìı:†‰È>"ß>Æéeúè^Ç}˜¡»Œ.…€Ø7çèsÆÌÅ©m–¢aÕ]Öd™ä5¸Uô
¸1ø+ÙÑ!|r~OßÅ%æÊ;ë.#{\¬G‰3´IU—Qïz¡¿ ®‘I0&ùW¢^ fâkd{˜ rX©ä~r+JÙ¢êà#"ã8úé§Ì%¨$d¹üÄûhC (€û[°õt?ø~…N$"å~’°,²×^Ád–"ÛW‘çV)¯Šï;P1AT|0p·|>²ûq‘ÚÜ4¼Z,5Õ>ı§¸BNî¬òkÃg\`0Î(ó-…ÖVØm,Ãpr.úLœáÊtnnÖ:<ÀüÄ©e˜ªÛ0!Å¤_hqº”Ì–×G »áiy¹;zİ…`~FsXi.Lz7Ğ}›åö(_±Â!Æ`‹B|™ 8Rˆg¾, ƒ†M<WËÿ“ëŠvc¤
M^¼Lıå‹ãzô^1wL®”¼Ì…¨D—†Ÿ¸ÊO|É$¥	±LJ£g’/ì”	° ‡øPäõ(c¾½]‰Èó|åFø\½Yu°9ó´ˆ®¹±ü?‚Î£®aGn%;ºÁWd¬v°aZá”K<|;[6RØR–ÃV<Ø0¥°m_)‡ïgp0YÌİ\SS¿-Wš¬LÉˆ[†6q_3ä”äHÛÖ+b3˜CRhš”š"†nJ¹¤°·H¼äk¨3Y;8E^ş”A‘¹ÉÒè²Ibª+eÑt”ˆ–/#a‡'Ä±bìë’	RFÅ}­šÈ%å_‹U‚óE8Êö0ü)t†gZù÷h©ÑÜ+ÒƒàürJó¥Y~$ù7šıä±ªkŒ$ö6x„ù‰8Ã—€V+6ãLS³C*vm'•4«Î•Å‹£ú4’™ò¸ÁŸws`@¨ª¤0GñGÕ4¶|¯	{¼,úœ *‹£—À‹	Ú Maµğ‡Š.y>õV`äCøwÏ?ò¡J°G¢ø}•Èó‘g¿q5<—+/ËäğóØóÜ¬ØºYÆsK¨šÒèKòkFÃÌ ¢ŸËÄ„b:# TÓytº;”á«En-vÔ”0‘¢£€‹7à~ıb¸)Ñé³ª*
x°ş3¶ú{AäºËÚ.Z7®6íŸn€HM™5?-YoFî†‚ÃÃv„¢„èY"#.™ƒMmêçÅ3Î~b.©b9Zp_ü.iĞ€æêÅ°i§?ˆÒª¥8ÿXØŠ8úü¤¡Ğœüô/Éò]}}”Z,YBá¨^_TS°°,ƒ…©—ã973Y=ÿæ>}ì/–ÂaG‹Œ6¬*R2]g†_ØË¤%†k=Ò]?K¿Îìr÷ˆf˜	q0VeÒ<B55˜^şŠx™÷şVİä9B¾W0ŠYrÓB˜½„.Ä2	µ>E+êçÏn"2—ş€Gá‡Zù‡ÌÈ3Ñsº @İá8¼bÁÊC¡»âª½ÈEã`[7èÛw„z·‡hT­Ÿáø«@^n‰îkõÏOÑMƒtu$ZÏ˜x‰?ñ`ñ1YyÔÔSTßü”Ğ¾ğ„é6øÂ‹j[ç7œnà¦{’/|hšU¾ğ”«Ââá·y®å°ñ…ßÍ²ğ…—-ğ¾°¯ÌÈîØ/Üş²°_xÑ#¡/Š¾Æ|áN¿ºÌ>?Õy¾pçÓç7œjà¦–0_xå3¾ğŒ?…l|áÍUœæYNÏq¼$ùÂ]|YøÂw/
]åûˆ\ám†ùÂÃ3ÍøÂDNğ…?iç_xó-Ç&_xÆ™áïâºÆn}Ah…/üä¦•/|ö¦Ğœ/|=İ._ø‹ÿ´Kä».,&¾ğ›pqÛ|áÌ,Ìş÷±–£Åôíì|á37„&|áÇJ_xËqGùÂiÿ	_6¾ğöL6¾ğ©ÇBoáû²Îîã"_øó|aéà'ÑBïãW>ãi¾ğ¬ó…Gµq/¼ş¹Ğ|áÿn	‹Â>Ÿå_xO¾Ğ
_¸Ş)Û|á²§J/Üï¨“|áæ‹ 9ô´K|á-á¿Ç}™ùÂ!j¡u¾pÇ<a1ò…—Ÿ*Y¾põSf|áœëB·ò…k¤²ğ…öÃtœ,_øhs¾°oğ¥ä?G{3¾pøBÏó…O/üN¶Ğ_¸ñ	û|á
'J_øƒ4ÇùÂ‡9Ï~ê8_xĞ±åÇ‹ÀşGàV¾pÏ£F^kŞ¿BOó…{e0|áÆW…îåßiZ4¾ğ‚¦îå¿H3âºæĞÓ|áüc_øËBoá>öJò…'õ*¾ğãˆÒÄîpWèY¾ğMüÍ&_8yÀæ4_xá¡·ò…½WÊøÂõ~t/_xÈßZÎk¾p‰ò…ïï}Í~9ùÂÊƒz¾°¦›}¾pÃ“,|ár'­ñ…—t³àûnu/¼ú2z<o/¬:á|á›¢–ÛåŸ9^T¾pPÏRÁ®¾ú5_¸´ó…«^Zákÿ–_8éo¡M¾ğXøî5_øeáo» ô6¾°fš›øÂi	­ğ…·ü%|Í~Í6çuEè_ø­Éîãweá‹®
â«§8Ï^ú“Ë|áiSœäú©è|ác“­ğ…ãë9Èş%Å&_øÊe¡ë|áÙß:Ä^İÕ_xĞ¿/¬ò…?èjàëêI¾ğ½.VùÂ´Ïv”¯:¿‹ó|Õ•ë=ÏW½,5ğUoHK˜¯ÚYjÆW=¹•¯úiSã«Şº&ÔñUO~cÉWu+ÿ;Ëş÷Vş÷‡^ÀÿîÜÒ„ÿ]Åş÷V+üïcFş÷Vÿ{•9ÿ›-?û‰ÂùÙ/üÆì†­äg?¹Oh™ŸïeÃ™½¯l¼aß+ëİÄ˜îyÃ,÷¼Ì~·ºJ¨a¿{^®Şƒnå ¶°
t–D·–İEº²§,ó¹qÿÊì4É¦yÙ&ã`fbm-úş›yßC Á—O1&V^S÷ìËØõ©½úû¨ÿ ®ñA6sä©ş`h'ˆºièÉ|âJv ¸™#ø÷#ËÈŠ£GğßKåÏ_€[Ğ5OitËˆ"ƒÜËd[ÿmÚŸTÙÿÅSôsş’M*³/şG˜ô_%ü±Myìar ñwg©ËV§³#åqüó¥)êÙÈ¶’¡U™ø“¯RÔãğœcÎ´edrÛäÊOì†¿ƒO¦ñˆè©<t‚6xù{A§éİŸ£‘’Ğ`u8sVùƒ÷N²ûƒ{ØüAR/ğTs£?hÄîšn.ìf§üA•ÍzĞb¹Ğczœm'Øñ_±›^?/ÀRŒÿ_*²ãÿóÆÂøkğ_²Qÿ¾¯Ìñ/NıÆÂß…öõ7º¬ßhÇwE¿±¥Öo|÷¥™~cß	ıÆŞ çôêL;úkJD¿ñßi¡Kú™ßYÓo4ÛÉ®ß¨¼ÓB¿Qo©]ıÆÙôÂúEŠI¿Ñ;İ~ƒ·ë7"Óú²³Øõ•~6Õo„.)ú;_9ªßğ9úÒé7îÉ¦ß¨pÄkôíX×o¬¨è¢~ã÷_K‰~#s·ê7z¬ñ´~£ÛgÖõ›]ĞoÜ8îVı†pW‘ôo®vF¿‘÷«5ıÆ•¶õV– ~cùb'õS©b ¤¯[å’~£U9gôãO_bıÆà_lè7>M/NıÆ¥•%«ßè·ÒL¿ñîîÕoô_Ä¢ß'Ãt‘­(š~ÃÏŸE¿ÑşäË©ßh¹ÓR¿1êH1è7.+‚~ã£m¶ôã–Ù×oH—•6ıÆÊdÇõÚ/œ×o´Lv\¿±ú‹ÕoÌñ-‚~£¾¯[õKuÍS<®ßXº”ÑoŒûÁÍúF>EÓoœäºW¿Ñês#®Ù‡<®ßh½„ÑoTıŞkôßñJê7~^ìUú¶K)ÒoÌßïaıÆÛûíê7ÊîwM¿ñÛ>¯Õo4ÍïRºôCf»W¿±ö§×úÖo¼ŸôZ¿ñrê7QzıFÃûú1+XôVXÓoœ«c¡ßh?İyıÆµ-lúSËŠ¬ß`ã£œ)ÌGé¸Å&¥Õ²B|”´úÈÆQñ~¹i\Ùd‚šFÅàûşpªõz@D§ÊÂ9\	%
ç.à!à%i$«GD?”5"éAèĞèT¤¿HçÑºvÑêŸ/K`­“DÁ²›HŸq „×ÇpéSø„»jbHjNM’)/¥‘şnhñhöƒM<}åU‚]Ç#»‹=<ÎŒ<v)<ŞùŞ&µ¾tU]Ç#Kj´1€ÇV)ğ=ùlğ='dXç{şú¶ïyîmOò=?|Û*ß³Ï§îá{æ†:Ï÷üašçùC|Ï¡%Ì÷Ü_ßŒïyEÉÊ÷Hqšï™»KÏ÷¼"ó$ßsÛfv~Q‹Ålü¢M/àíÃÈ/ê“3–•_ÔCQ˜_´z¥_$PèùEı'yßõŞ&vü÷%³áÖÔğoø¦ÿ4;şgçÆ¿Î
ş;çêñÿóã’ãwmû…ß%ë2¿kˆú…ü®“×Æ#~×±‰fü®ùp.‡ù]—r^8ÅïµÁ¿ëÊ´áwáû‹.ğ»VÍ¶Æïê³ßÕt¡¿«İ»ü®ëó»¶G¿ëü:{ü®°O0¿ëÇu~Wƒ¾ìü®&*S~WìøÒÁï
Lp”ßUï›—ßÅÿ˜ßÕx•×ğ»†Œ°ÎïÚG]ãwıû])áwÑÉ^Èïš4ÍÓü®‡Yçw¿%tßå·Ş­ü®^‹ŠÄïŠúÄ~Wğkü®yrÛü®òäwíë$¿kÙğb ¬™â¿kÀ¡ü®…›_f~×œÏmğ