ill always be lower case</span>
</pre></div>
</div>
</div>
<div class="section" id="passing-parameters-when-initializing-your-class">
<h2>Passing Parameters When Initializing Your Class<a class="headerlink" href="#passing-parameters-when-initializing-your-class" title="Permalink to this headline">¶</a></h2>
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
<h2>Utilizing CodeIgniter Resources within Your Library<a class="headerlink" href="#utilizing-codeigniter-resources-within-your-library" title="Permalink to this headline">¶</a></h2>
<p>To access CodeIgniter’s native resources within your library use the
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
models, or your views. If you would like to use CodeIgniter’s classes
from within your own custom classes you can do so as follows:</p>
<p>First, assign the CodeIgniter object to a variable:</p>
<div class="highlight-ci"><div class="highlight"><pre><span></span><span class="nv">$CI</span> <span class="o">=&amp;</span> <span class="nx">get_instance</span><span class="p">();</span>
</pre></div>
</div>
<p>Once you’ve assigned the object to a variable, you’ll use that variable
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
<p>You’ll notice that the above <code class="docutils literal"><span class="pre">get_instance()</span></code> function is being
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
methods, you’re encouraged to assign it to a property instead:</p>
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
<h2>Replacing Native Libraries with Your Versions<a class="headerlink" href="#replacing-native-libraries-with-your-versions" title="Permalink to this headline">¶</a></h2>
<p>Simply by naming your class files identically to a native library will
cause CodeIgniter to use it instead of the native one. To use this
feature you must name the file and the class declaration exactly the
same as the native library. For example, to replace the native Email
library you’ll create a file named <em>application/libraries/Email.php</em>,
and declare your class with:</p>
<div class="highlight-ci"><div class="highlight"><pre><span></span><span class="k">class</span> <span class="nc">CI_Email</span> <span class="p">{</span>

<span class="p">}</span>
</pre></div>
</div>
<p>Note that most native classes are prefixed with CI_.</p>
<p>To load your library you’ll see the standard loading method:</p>
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
<h2>Extending Native Libraries<a class="headerlink" href="#extending-native-libraries" title="Permalink to this headline">¶</a></h2>
<p>If all you need to do is add some functionality to an existing library -
perhaps add a method or two - then it’s overkill to replace the entire
library with your version. In this case it’s better to simply extend the
class. Extending a class is nearly identical to replacing a class with a
couple exceptions:</p>
<ul class="simple">
<li>The class declaration must extend the parent class.</li>
<li>Your new class name and filename must be prefixed with MY_ (this
item is configurable. See below.).</li>
</ul>
<p>For example, to extend the native Email class you’ll create a file named
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
in their constructor. Take a look at the library that you’re
extending first to see how it should be implemented.</p>
</div>
<div class="section" id="loading-your-sub-class">
<h3>Loading Your Sub-class<a class="headerlink" href="#loading-your-sub-class" title="Permalink to this headline">¶</a></h3>
<p>To load your sub-class you’ll use the standard syntax normally used. DO
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
<h3>Setting Your Own Prefix<a class="headerlink" href="#setting-your-own-prefix" title="Permalink to this headline">¶</a></h3>
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
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ��������K� ��������ڊ��4����_Pr��.�Q���wW�����sE�9����N��;�9�����s���mv��3����s�Q����WX�w>�Į�<��B�y���לּ����k7��;9���_�`Oߙ��w~��Aߙ����<��T�y#�t�;�,pTߙ���wn�����~�}��\�����.�;?O)%�Τ�P�Yy����o̶���uA߹��[���m.������;��X�w�K���,�\���~�:��l>�kC���|Q儾�/��3d�}g��ũ�\�\�����f�Μ�ܫ﬑Ȣ��Y�E��h�Σϣ��;}S_N}��M����=Š�LTA���:[���*���
�Ҧ��@鸾�p����牎�;%���3&/�u}�?O�ܩ����Q�������^�1���kܬ３U$}��(��;_(���������$F���7^����J�;'}�U��Ǐ��"}g��w��nWߙ��5}���^��|�o�ҥ�'s���޲����wޟ�Z��r�;�s��NM��Ά�X���Y�w.�b����輾��b6}�JU��O?��~��9�ڝʮ��v��ӫ�R�K�b�C�9%�&w(����:k���c�� ��������~�����mgW�;��}�����ᱞ_��Ȯ�w����C��Qe[�����bQ��1�����7�������~��|�A��֮�w ���-Q�oE���|{��X����8�������S��ߑ&|��oE[�3�����݁:�p�A;�u��[������n��L���]�#�zX7��~S��ۦ%����^�o�h�}ue+��ya~�5���&���m+�GY��¾5%v��<G���3�u�&��"af���]���<S��ў������z�L������}+auo2��	��O�1��6�d��
+��k�j��a��m�I�u�~��⌉����z�A��3]b�c(�>�3_����!u��7̴�!#$,���T�D�y�� Y2�j��7z��YP>h�Ƒ>bJ�����h�4{�3�9�
�fbX#L���ߓ�b�MYL�ڸ����+�N����QЛ�b����A�������_�:�/a}vK��]I`�gluZ���V�Ͼ�?+�l�����2���K]o��pL�\`��=&Z���d��2�P�ep!���?�Ò��i9H�^�t�s�F���}���Q7�|��΄flE ��o�H\�]<�#r���}�"/hV+�����C���>4Cxj"5���Di�2$� MJ����1z����Ȉ��P�ƥе��/'�K9���D�M_-�g���py�#OAseH�t1���߆������6�����#tC������ݤ������Ao�Je�xh�M�k�ηn�w�@O�K$��7�G�M�i߻	���:���W��&<�/=�&��>��#z��W���/�[�7��A߸�3�=�o�\����
�~�v|�v��o��~}�����gUap�7�\��8z|�y
߰96�:�#��!����[���u��D�a�J7�o����7s�M|g�=�o��6�7��+���E���
7��SoO�;r�M|k�<��-�|+���wF����{m�����S��f؎<�Jlſ�-�_�u|�p���;����َ?���֠���w�e�{���C��ҽ�����?��N�L�+��~d�޲n�8�]��������)����	[����������;�߮�'ێ�y߲mſ�-����Z@k?w#�	]��ۗ_��U>��W����B���L��1�oUK|������L�	�}r���t�hF�v��x���=�M���!rx2��JT;6ᓥ��Q~�`�H�������'�1<_�R�4oTst@���W�8��-�/�+fG���-��n��a�UK��eD���5bR�����3�1�}����e�27��]L�Bo%�q)ٗ'!gBg�����`�j���Lo�)���_Ԫ �e9B���e��L�Fm|s̯���cp�;bn�T��Wn�U�b�g(\��IvȂ	���X	WS�L��x�ާ����m��VE��S��S!k�����`i�t� ����D��xFt�P�S���T�x+?Q����Cr�����ఙ�<Ӡ@�+p�mҾ&���a��#z��ǋ���2�"ٹ�
SZ4a��J�z��,ߨ����<�(|�:g�܊�p����>�X�t��3
�p�+A?`xZ���~�y�A�|���� �����?l����cH~F`�V��3����j��LF�W�1%�`�=�;Il��8�"�=f[CD�U���G��'�$͗�NQV�W���5?��N}�D�V���L�s����.�/�K8�K���]B�M�p��%�(&���M�P������9��暹�w暻��%TaN��g������~a�3~aXa�`xʌ�U�Z�����@��C��?���1V���L����T��������d�ƙ���.F����Es`��e��O7�����������[�ڌ�4�"�s��٫/LI)�x��L3�Pn��x�dⅬ��":Y��gX�V��A�v��4#���U�l�CΛ���x���W!^v�8ㅲ����'S_�^/����x!��E�0h��xa�!��������a����l��vg���~?�3�U��{��?ܒ��������Cr'���"��Vf�?��g��h���������~3�}�����W�?��,N��>��?�2���0��{�CVk�Pg���b��?\z�?P����=l��f�a��?|�ɫ��v��0��?|5�����ν�aG��Ў��j�d��#=�����jw���3������_�p����G���)#_�/�m�������GV�ó�������C���C~'��!-��?�����
������#����>�^�/�A-��&FZ���C���?7���p�����v�Ol��������4�U�����0��?4��?x�x t��ol�V���}g�����(/�������5���Ż�^����8�C�f��ڀ����CV�{�CD��������[#��n1�:��?����e�6��_	���b�?�5�?�y����������-�}��V�������.���m�Ï����!g�+���X�=��=^�o�?����b��a������U�,����ug��9.������]��yg>��y��Y��p.��o>�<�p�M������ک���n���vs������oN����!���9�M��7{�.\��ծn���g����V��o!��揭�7;h�����.0��9�j騿٨���7�Žt�7�f��)������*X����(��o�!-%�7yͽ���u=]�����o�UQ���������"����L���Rk�7�ֲ]s~���y����7�CA��r���ʙ����_���k�ۨ��ѱ8�oV�]��7��2��9��{�o�b��I�t�Y�h�7c�X�o*�/g���B����c����_�"��������[�ۯ���^��o^~����m�:_s���߼V�D�o�$����D���<W�X'r����7�x��������o�U��f�½�7gT2�����3�2�7{5����9U^����*{U�Mٜ�T3����ooe��f�V��߬��k�oN�U��o�帹�f����%\sB����/g��2��7�|o���5Y�o~V�Z��*pZ����B��o��V�B�����Q�f��՝�����.׋�����zq��p�
�O�W���M<�;������e�J� ���lx�0>�EO3%� Lm�vc9T�)	��m��@�Ca3sX��%G�L���zJ�7��*�����{��U4G��w�z\���?o��E���2DL�*��W7�E����2KZ�.DJ�!0�M�&m�S4B4Z-6�{��e�o��M��F�{��|}�/�*o�o4e<{}�I����c�o��__�h���V�3�za֗s�^���B��{����^���r%[/l�Ť�[ʲ���t���(}��-�	-�'�f��,|��e\��4�
��롘O���ДO�{�|�����\
�ç�R ,	>��Ʈ�i��Z�ӼS��O�[ɂOS�����[��4����OñƧ��=>M����}���ɽ�Χ�yÔOS塰T�i���p�O��Kǧ��X�§��>M��U>�gc]�Ӥ��>͞*^ȧi�ݳ|-�ʧY>�>͹w�ʧy�r��4e�N�i�pk|��O�6�4Q軒�Ӑ���iF���'|q�|�F#���|��e���W����Z�|��O�%ʧ��M�45����t�+�ϧ��U�eX��H|���X�4M�}9�4+Y�i��->��\��|�>���4���4�����OC�:̧����i>MC��7��,�� �f�������?��i!h��>���8�F�H��4�̧�5�h|���˧it߈kV-��i?b>M���iV�${�4�`By�&t`i��L��a>M��v�4����i{-�����O���Э|���^�iJ�OS��5�����Ru|�����i>���]>M8�0���L>M�K��iN���i�
�ʧ1�?/zs��v���,���fĂz��BU?�aRA�@7��򎠻�>h+������;��&�}��!�F'��T.?��B�0�� y���ٖp��=	"�("������D���#Uo�-��F���	EJ~���OR ,C7�x�p�A���&jN�z�O��N����	�����9�/�3�w?&���V��/��q�\�b]{y\y�(7.8DL��d���qR�`�db1s�Ĵ��8���gDk-g�_Lv��D.C�L������U��ͭ�!�Gl���}B0�����ij5��b��O���#�ø+F�b���<���U
s�pTM�Qb2E�J�j�B>���B�H��؟�P���E�)�����Ē���e(��R�'J������hx��C���}��|*JU�#CN�|Ǝ�隡��1	?��R~�)7�����ς��Ug0�Rt�:$��b��+!�uT{��A�=C� S>�^�qQ����pY |�î�+��W���:���>"�>��e��^ǐ}����.���7��s��ũm��a�]�d���5�U��
�1�+��!|r~O��%��;�.#{�\��G�3��IU�Q�z������I0&�W�^�f�kd{� rX��~r+J٢��#"�8����%�$d����hC�(��[��t?�~�N$"�~��,��^�d�"�W��V)���;P1AT|0p�|>��q���4��Z,5�>����BN��kÞg\`0�(�-��V�m,�pr.�L���tnn�:<��ĩe���0!Ť_hq��̖��G���iy��;z��`~FsXi.Lz7�}���(_�!�`�B|��8R�g�, ��M<Wˁ����vc�
M^�L���z�^1wL���̅�D������O�|�$�	�LJ�g�/�	����P��(c��]���|�F�\�Yu�9󴈮���?�Σ���aGn%;��Wd�v�aZ�K<|;[6�R�R��V<�0��m_)��gp0Y��\SS��-W��LɈ[�6q_3���H���+b3�CRh���"�nJ����H��k�3Y;8E^��A������Ib��+e�t���/#a�'ıb��	R�F�}���%�_�U��E�8��0�)t�gZ��h���+҃��rJ�Y~$�7�����k�$�6x���8×�V+6�LS�C*vm'�4�Εŋ��4������ws`@���0G�G�4�|�	{�,���*�����	��Ma����.y>�V`�C�w�?�J�G��}���g�q5<�+/������ܬغY�sK����K�kF�� ���Ąb:�# T�yt�;��En-vԔ0�����7�~�b�)�鳪*
x��3��{A����.Z7�6�n�HM�5?-YoF��v����Y"#.��Mm���3�~b.�b9Zp_�.iЀ��Űi�?�Ҫ�8�X؊8����М��/��]}}�Z,YBᏨ^_TS��,�����973Y=��>}�/��aG��6�*R2]�g�_�ˤ%�k=�]�?K���r��f��	q0Ve�<B55�^��x���V��9B�W0�Yr�B���.�2	�>E+���n"2���G�Z����3�s� @��8�b��C��⪽�E�`[7��w�z��hT�����@^n��k��O�M�tu$ZϘx�?�`�1Yy��ST��������6�j[�7�n��{�/|h�U������y���������-�������؎�/����_x�#��/���|�N���>?�y�p�Ӟ�7�j���0_x�3���?�l|��U��YN��q�$��]|Y��w/
]���\��m����3���DN��?i�_x�-�&_xƙ����n}Ah�/�䦐�/|��М/|=�._����K�.,&��pq�|��,����������|�37�&|��J_x�qG��i�	_6���L6���Bo������"_��|a��'�B��W>�i����G�q�/���Н|��n	��>��_xO��
_��)�|ᲧJ�/�﨓|���� 9��K|�-����}���!j�u�p�<a1򅗟*Y�p�Sf|��B��k������t�,_�hs��o���?G{3�p�B��O�/�N��_��	�|�
'J_��4���9�~��8_xб�����G�V�pϣF^k޿BO�{e0|��W����iZ4�������H3����|��c_���Bo��>�J�'�*������pW�Y��M��&_8�y��4_x�����W����~t/_x��Z�k�p����}�~9��ʃz����}�pÓ,|�r'��t���nu�/��2z<o�/�:�|������9^T�pP�R����5_���^Z�k��_8�o�M��X��5_�e�o� �6��f����i	�����%|�~�6�uE�_�����we���
���8�^���|�iS������|�c������9��%�&_��e��|���:�^��_xп/��?�j���I��.V����v��:���|Օ�=�W�,5�UoHK���Yj�W=�����iS��޺&��UO~c�Wu+�;���V���^����҄�]���V+��cF��V�{�9��-?�����/��솭�g?�Oh���eÙ��l�a�+��Ę�y�,���~��J�a�{^�ރn� ��
t�D���E���,�q���4ɦy�&�`fbm-���y�C���O1&V^S����������� ��A6s䐩�`h'��i��|�J�v ��#���#����G��K��_�[�5Oitˈ"���d[�mڟT���S�s��M*�/��G��_%��My�ar��wg��V��#�q��)��ȶ��U����R���cδedr���O솿�O���<t�6x�{A���ݟ����`u8sV���N���{��AR/�Ts�?h���n.�f��A��z�b��cz�m'��_��^?/�R��_*�������k�_�Q������/N���߅���7���h�wE����o|���~c�	��� ���L;��kJD���i�K����Y�o4�ɮߨ��B�Qo�]�������E�I��;ݞ~���7"��������~6�o�.)��;_9���9���7�ɦߨp�k��X�o���~��_K�~#s��7z��~��g���]�o�8�V��pW��o�vF����5�Ɛ���V��~c�b'�S�b ��[�~�U9g��O_b���_l�7>M/N�ƥ�%����L�����o�_Ģ�'�t��(�~�ϟE����˩�h��R�1�H1�7�.+�~�m�����oH��6���d���/��o�Lv\�����o��-�~���[�Ku�S<��X���o������F>E�o��W���s#�ه<��h���oT��k���J�7~^�U���K)�o���a������7��wM���>��o4��R��Cf�W��������o���Z��r�7�Qz�F����1+X��VX�o��c��h?�y�Ƶ-l��Sˊ��`㣜)�G��&�ղB|�����Q�~�i\�d��F����p��z@D���9\	%
�.�!�%i$�GD?�5"�A���T��H���v��/K`��D���H�q�����p�S���jbHjNM�)/���nh�h��M<}�U�]�#��=<Ό<v)<���&��t��U]�#Kj��1��V)�=�l�='dX�{�����y�mO�=?|�*߳ϧ��{�:���a�����C|Ϟ�%���_ߌ�yE���Hq�K���"�$�s�fv~Q��l��M/����/�3��_�CQ�_�z��_$P��E�'y����&v��%�����o���4;�g�ƿ�
�;�������wm����%��2�k��������#~ױ�f���p.��]�r^8������ʴ�w���.�VͶ��곐���t���������G���:{���O0���u~W�����&*S~W�����
Lp��U��������x��𻆌����G]�w��])�w��^��4������Y�w�%t���ޭ��^������~W�k��yr�����w��$�k��b ����k������_f~ל�m�