<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* pages/samples/curateList.html.twig */
class __TwigTemplate_8f101698a8fad73a28d3bf015e3fc8fd extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "templates/registrationForm.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        $context["title"] = twig_capitalize_string_filter($this->env, "Curadoria");
        // line 4
        $context["curateActived"] = "active";
        // line 1
        $this->parent = $this->loadTemplate("templates/registrationForm.html.twig", "pages/samples/curateList.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "
";
        // line 9
        echo "
<div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
  <h1 class=\"h2\">Curadoria</h1>
</div>

";
        // line 15
        echo "
<div  class=\"album py-1 bg-light\">
  <div class=\"container\">
    <div class=\"row\">

";
        // line 21
        echo "
";
        // line 22
        if (($context["samples"] ?? null)) {
            echo "  
      <div class=\"accordion\" id=\"samples\">

";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["samples"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["sample"]) {
                // line 26
                echo "        <div class=\"accordion-item \">
          <h2 class=\"accordion-header\" id=\"heading";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 27), "html", null, true);
                echo "\">
            <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 28), "html", null, true);
                echo "\" aria-expanded=\"false\" aria-controls=\"collapse";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 28), "html", null, true);
                echo "\">
              ";
                // line 29
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "register", [], "any", false, false, false, 29), "html", null, true);
                echo ": ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "name", [], "any", false, false, false, 29), "html", null, true);
                echo " (enviado em: ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "editedAt", [], "any", false, false, false, 29), "html", null, true);
                echo ")
            </button>
          </h2>
          <div id=\"collapse";
                // line 32
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 32), "html", null, true);
                echo "\" class=\"accordion-collapse collapse\" aria-labelledby=\"heading";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 32), "html", null, true);
                echo "\" data-bs-parent=\"#samples\">

          
            <div class=\"accordion-body pb-0\">
              <div class=\"d-flex gap-4\">
                <ul class=\"p-4 col-5 bg-light border rounded\">
                  <h3 class=\"h5\">Dados básicos</h3>

";
                // line 40
                if (twig_get_attribute($this->env, $this->source, $context["sample"], "cover", [], "any", false, false, false, 40)) {
                    // line 41
                    echo "                  <img src=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "cover", [], "any", false, false, false, 41), "html", null, true);
                    echo "\" height=\"30\" class=\"img-thumbnail my-2\" alt=\"capa\"/>
";
                }
                // line 43
                echo "
";
                // line 44
                $context["itemStyle"] = "border-top p-1";
                // line 45
                echo "                  <li class=\"";
                echo twig_escape_filter($this->env, ($context["itemStyle"] ?? null), "html", null, true);
                echo "\"><strong>Longitude:</strong> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "longitude", [], "any", false, false, false, 45), "html", null, true);
                echo "</li>
                  <li class=\"";
                // line 46
                echo twig_escape_filter($this->env, ($context["itemStyle"] ?? null), "html", null, true);
                echo "\"><strong>Latitude:</strong> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "latitude", [], "any", false, false, false, 46), "html", null, true);
                echo "</li>
                  <li class=\"";
                // line 47
                echo twig_escape_filter($this->env, ($context["itemStyle"] ?? null), "html", null, true);
                echo "\"><strong>Profundidade</strong> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "depth", [], "any", false, false, false, 47), "html", null, true);
                echo "</li>
                  <li class=\"";
                // line 48
                echo twig_escape_filter($this->env, ($context["itemStyle"] ?? null), "html", null, true);
                echo "\"><strong>Data de coleta:</strong> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "colectedAt", [], "any", false, false, false, 48), "html", null, true);
                echo "</li>
                  <li class=\"";
                // line 49
                echo twig_escape_filter($this->env, ($context["itemStyle"] ?? null), "html", null, true);
                echo "\"><strong>Autor:</strong> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "author", [], "any", false, false, false, 49), "html", null, true);
                echo " (ID: ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "authorId", [], "any", false, false, false, 49), "html", null, true);
                echo ")</li>
                  <li class=\"";
                // line 50
                echo twig_escape_filter($this->env, ($context["itemStyle"] ?? null), "html", null, true);
                echo "\"><strong>Referência:</strong> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "reference", [], "any", false, false, false, 50), "html", null, true);
                echo "</li>

                  <li class=\"";
                // line 52
                echo twig_escape_filter($this->env, ($context["itemStyle"] ?? null), "html", null, true);
                echo "\"><strong>Cidade:</strong> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "city", [], "any", false, false, false, 52), "html", null, true);
                echo "</li>
                  <li class=\"";
                // line 53
                echo twig_escape_filter($this->env, ($context["itemStyle"] ?? null), "html", null, true);
                echo "\"><strong>Estado:</strong> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "state", [], "any", false, false, false, 53), "html", null, true);
                echo "</li>
                  <li class=\"";
                // line 54
                echo twig_escape_filter($this->env, ($context["itemStyle"] ?? null), "html", null, true);
                echo "\"><strong>País:</strong> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "country", [], "any", false, false, false, 54), "html", null, true);
                echo "</li>
                </ul>
                <div class=\"d-flex flex-column col-10 gap-3 mb-3\">
";
                // line 57
                $context["dataStyle"] = "p-4 col-8 bg-light border rounded";
                // line 58
                echo "                  <div class=\"";
                echo twig_escape_filter($this->env, ($context["dataStyle"] ?? null), "html", null, true);
                echo "\">
                    <h3 class=\"p-2 h5\">Contagem de táxons</h3>

";
                // line 62
                if (twig_get_attribute($this->env, $this->source, $context["sample"], "images", [], "any", false, false, false, 62)) {
                    // line 63
                    echo "                    <div id=\"fitoplanctonsImages";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 63), "html", null, true);
                    echo "\" class=\"carousel slide bg-warning\" data-bs-ride=\"false\">
                      <div class=\"carousel-indicators\">
";
                    // line 65
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["sample"], "images", [], "any", false, false, false, 65));
                    $context['loop'] = [
                      'parent' => $context['_parent'],
                      'index0' => 0,
                      'index'  => 1,
                      'first'  => true,
                    ];
                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                        $length = count($context['_seq']);
                        $context['loop']['revindex0'] = $length - 1;
                        $context['loop']['revindex'] = $length;
                        $context['loop']['length'] = $length;
                        $context['loop']['last'] = 1 === $length;
                    }
                    foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                        // line 66
                        if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 66)) {
                            // line 67
                            echo "                        <button type=\"button\" data-bs-target=\"#fitoplanctonsImages";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 67), "html", null, true);
                            echo "\" data-bs-slide-to=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 67), "html", null, true);
                            echo "\" class=\"active\" aria-current=\"true\" aria-label=\"Slide ";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 67), "html", null, true);
                            echo "\"></button>
";
                        } else {
                            // line 69
                            echo "                        <button type=\"button\" data-bs-target=\"#fitoplanctonsImages";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 69), "html", null, true);
                            echo "\" data-bs-slide-to=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 69), "html", null, true);
                            echo "\" aria-label=\"Slide ";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 69), "html", null, true);
                            echo "\"></button>
";
                        }
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['length'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 72
                    echo "                      </div>
                      <div class=\"carousel-inner\">
";
                    // line 74
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["sample"], "images", [], "any", false, false, false, 74));
                    $context['loop'] = [
                      'parent' => $context['_parent'],
                      'index0' => 0,
                      'index'  => 1,
                      'first'  => true,
                    ];
                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                        $length = count($context['_seq']);
                        $context['loop']['revindex0'] = $length - 1;
                        $context['loop']['revindex'] = $length;
                        $context['loop']['length'] = $length;
                        $context['loop']['last'] = 1 === $length;
                    }
                    foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                        // line 75
                        echo "                        <div class=\"carousel-item ";
                        if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 75)) {
                            echo "active";
                        }
                        echo "\">
                          <img src=\"";
                        // line 76
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["image"], "path", [], "any", false, false, false, 76), "html", null, true);
                        echo "\" class=\"d-block w-100\" alt=\"...\">
                          <div class=\"carousel-caption d-none d-md-block\">
                            <p class=\"bg-black bg-opacity-25\">";
                        // line 78
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["image"], "name", [], "any", false, false, false, 78), "html", null, true);
                        echo "</p>
                          </div>
                        </div>
";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['length'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 82
                    echo "                      </div>
                      <button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#fitoplanctonsImages";
                    // line 83
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 83), "html", null, true);
                    echo "\" data-bs-slide=\"prev\">
                        <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
                        <span class=\"visually-hidden\">Previous</span>
                      </button>
                      <button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#fitoplanctonsImages";
                    // line 87
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 87), "html", null, true);
                    echo "\" data-bs-slide=\"next\">
                        <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
                        <span class=\"visually-hidden\">Next</span>
                      </button>
                    </div>  
";
                }
                // line 94
                echo "                    <table class=\"p-2 mx-2 border-top border-1 table caption-top table-striped-columns\">
                      <caption>Unidade de medida: ";
                // line 95
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "measure", [], "any", false, false, false, 95), "html", null, true);
                echo "</caption>
                      <thead>
                        <tr>
                          <td scope=\"col\">Táxon</td>
                          <th scope=\"col\">Média</th>
                          <th scope=\"col\">Máxima</th>
                        </tr>
                      </thead>
                      <tbody>
";
                // line 104
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["sample"], "fitoplancton", [], "any", false, false, false, 104));
                foreach ($context['_seq'] as $context["_key"] => $context["taxon"]) {
                    // line 105
                    echo "                        <tr>
                          <th scope=\"row\">";
                    // line 106
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "name", [], "any", false, false, false, 106), "html", null, true);
                    echo "</th>
                          <td>";
                    // line 107
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "mean", [], "any", false, false, false, 107), "html", null, true);
                    echo "</td>
                          <td>";
                    // line 108
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "max", [], "any", false, false, false, 108), "html", null, true);
                    echo "</td>
                        </tr>
";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['taxon'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 110
                echo "  
                      </tbody>
                    </table>
                  </div>
";
                // line 114
                if (twig_get_attribute($this->env, $this->source, $context["sample"], "context", [], "any", false, false, false, 114)) {
                    echo "             
                  <div class=\"";
                    // line 115
                    echo twig_escape_filter($this->env, ($context["dataStyle"] ?? null), "html", null, true);
                    echo "\">
                    <ul class=\"p-2\">
                      <h5>Dados auxiliares</h5>
";
                    // line 118
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["sample"], "context", [], "any", false, false, false, 118));
                    foreach ($context['_seq'] as $context["_key"] => $context["info"]) {
                        // line 119
                        echo "                    <li>
                      <strong>
                        ";
                        // line 121
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["info"], "name", [], "any", false, false, false, 121), "html", null, true);
                        echo ":
                      </strong> 
                      ";
                        // line 123
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["info"], "value", [], "any", false, false, false, 123), "html", null, true);
                        echo " ";
                        if (twig_get_attribute($this->env, $this->source, $context["info"], "measure", [], "any", false, false, false, 123)) {
                            echo "(";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["info"], "measure", [], "any", false, false, false, 123), "html", null, true);
                            echo ")";
                        }
                        // line 124
                        echo "                    </li>
";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['info'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 126
                    echo "                    </ul>
                  </div>
";
                }
                // line 129
                echo "                </div>
              </div>
            </div>
";
                // line 133
                echo "            <div>
              <div class=\"d-flex gap-4 mb-2 mx-4\">
                <button type=\"button\" class=\"btn btn-danger w-50\" data-bs-toggle=\"modal\" data-bs-target=\"#reproveSample";
                // line 135
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 135), "html", null, true);
                echo "\">
                  Reprovar
                </button>
                <button type=\"button\" class=\"btn btn-success w-50\" data-bs-toggle=\"modal\" data-bs-target=\"#aproveSample";
                // line 138
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 138), "html", null, true);
                echo "\">
                  Aprovar
                </button>
              </div>

              <div class=\"modal fade\" id=\"reproveSample";
                // line 143
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 143), "html", null, true);
                echo "\" tabindex=\"-1\" aria-labelledby=\"reproveSample";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 143), "html", null, true);
                echo "\" aria-hidden=\"true\">
                <div class=\"modal-dialog modal-dialog-centered\">
                  <div class=\"modal-content\">
                    <div class=\"modal-header\">
                      <h1 class=\"modal-title fs-4\" id=\"reproveSample";
                // line 147
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 147), "html", null, true);
                echo "\">Reprovar amostra</h1>
                      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                    </div>
                    <div class=\"modal-body p-0\">
                      ";
                // line 151
                $this->loadTemplate("form/sample/disapproveSample.html.twig", "pages/samples/curateList.html.twig", 151)->display($context);
                // line 152
                echo "                    </div>
                  </div>
                </div>
              </div>

              <div class=\"modal fade\" id=\"aproveSample";
                // line 157
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 157), "html", null, true);
                echo "\" tabindex=\"-1\" aria-labelledby=\"aproveSample";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 157), "html", null, true);
                echo "\" aria-hidden=\"true\">
                <div class=\"modal-dialog modal-dialog-centered\">
                  <div class=\"modal-content\">
                    <div class=\"modal-header\">
                      <h1 class=\"modal-title fs-4\" id=\"aproveSample";
                // line 161
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sample"], "id", [], "any", false, false, false, 161), "html", null, true);
                echo "\">Aprovar amostra</h1>
                      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                    </div>
                    <div class=\"modal-body p-0\">
                      ";
                // line 165
                $this->loadTemplate("form/sample/approveSample.html.twig", "pages/samples/curateList.html.twig", 165)->display($context);
                // line 166
                echo "                    </div>
                  </div>
                </div>
              </div>
            </div>
";
                // line 172
                echo "          </div>
        </div>
";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sample'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 175
            echo "      </div>
    </div>
  </div>    
</div>

<datalist id=\"commonAnswers\">
  <option value=\"Conteúdo inapropriado\">
  <option value=\"Dados incoerentes\">
  <option value=\"Dados incompletos\">
</datalist>
";
        } else {
            // line 185
            echo "      

      <div class=\"bg-white p-4 rounded\">
        <p class=\"\">Não há coletas para curar.</p>
      </div>
    </div>
  </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "pages/samples/curateList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  535 => 185,  522 => 175,  506 => 172,  499 => 166,  497 => 165,  490 => 161,  481 => 157,  474 => 152,  472 => 151,  465 => 147,  456 => 143,  448 => 138,  442 => 135,  438 => 133,  433 => 129,  428 => 126,  421 => 124,  413 => 123,  408 => 121,  404 => 119,  400 => 118,  394 => 115,  390 => 114,  384 => 110,  375 => 108,  371 => 107,  367 => 106,  364 => 105,  360 => 104,  348 => 95,  345 => 94,  336 => 87,  329 => 83,  326 => 82,  308 => 78,  303 => 76,  296 => 75,  279 => 74,  275 => 72,  253 => 69,  243 => 67,  241 => 66,  224 => 65,  218 => 63,  216 => 62,  209 => 58,  207 => 57,  199 => 54,  193 => 53,  187 => 52,  180 => 50,  172 => 49,  166 => 48,  160 => 47,  154 => 46,  147 => 45,  145 => 44,  142 => 43,  136 => 41,  134 => 40,  121 => 32,  111 => 29,  105 => 28,  101 => 27,  98 => 26,  81 => 25,  75 => 22,  72 => 21,  65 => 15,  58 => 9,  55 => 7,  51 => 6,  46 => 1,  44 => 4,  42 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/samples/curateList.html.twig", "/shared/httpd/portal/app/views/pages/samples/curateList.html.twig");
    }
}
