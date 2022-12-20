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

/* pages/samples/formManualInsert.html.twig */
class __TwigTemplate_0d3321c73093e544aec3ddd78e4d88e3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'main' => [$this, 'block_main'],
            'script' => [$this, 'block_script'],
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
        $context["title"] = twig_capitalize_string_filter($this->env, "Cadastro de ocorrência");
        // line 1
        $this->parent = $this->loadTemplate("templates/registrationForm.html.twig", "pages/samples/formManualInsert.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "<div class=\"pb-2 mb-3 border-bottom\">
  <h1 id=\"registro-de-coletas\" class=\"h2\">Registro de coleta</h1>
</div>
";
        // line 9
        if (($context["alert"] ?? null)) {
            // line 10
            echo "  <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
    ";
            // line 11
            echo twig_escape_filter($this->env, ($context["alert"] ?? null), "html", null, true);
            echo "
    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
  </div>
";
        }
        // line 15
        echo "<ul class=\"nav nav-tabs \">
  <li class=\"nav-item mx-1\">
    <a role=\"button\" id=\"tabGeral\" class=\"nav-link\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "/editar\">Geral</a>
  </li>
  <li class=\"nav-item mx-1\">
    <a role=\"button\" id=\"tabColetas\" class=\"nav-link active\" href=\"#registro-de-coletas\" aria-current=\"page\">Coletas</a>
  </li>
</ul>

<div id=\"navSection\" class=\"nav nav-tabs pt-2 mb-0 bg-white\">
  <li class=\"nav-item mx-1\">
    <a id=\"nav-col\" class=\"nav-link\" href=\"";
        // line 26
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "/amostras\">Todas as coletas salvas</a>
  </li>
  <li class=\"nav-item mx-1\" onclick='swapTab(\"man\")'>
    <a id=\"nav-man\" href=\"#\" class=\"nav-link active\" aria-current=\"page\">Novo cadastro (manual)</a>
  </li>
  <li class=\"nav-item mx-1\" onclick='swapTab(\"auto\")'>
    <a id=\"nav-auto\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "/amostra/cadastro-automatico\" class=\"nav-link\">Novo cadastro (automatizado)</a>
  </li>
</div>
<div class=\"col pt-2 mt-0 bg-whites\">
  <div id=\"tab-man\" class=\"py-2 bg-white p-4\">

";
        // line 38
        if (($context["sample"] ?? null)) {
            // line 39
            $context["action"] = (((($context["SITE_URL"] ?? null) . "/amostra/") . twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "id", [], "any", false, false, false, 39)) . "/atualizar");
        } else {
            // line 41
            $context["action"] = (((($context["SITE_URL"] ?? null) . "/registros/") . ($context["id"] ?? null)) . "/adicionar-amostra/manual");
        }
        // line 43
        echo "
  <form id=\"manualForm\" action=\"";
        // line 44
        echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" class=\"row needs-validation\">
    ";
        // line 45
        echo twig_include($this->env, $context, "form/sample/basic.html.twig");
        echo "
    <hr>
    ";
        // line 47
        echo twig_include($this->env, $context, "form/sample/manual.html.twig");
        echo "
  </form>
";
        // line 49
        if (($context["sample"] ?? null)) {
            // line 50
            $context["modalId"] = "updateCover";
            // line 51
            $context["modalTitle"] = twig_capitalize_string_filter($this->env, "Alterar imagem do local");
            // line 52
            $context["src"] = (($context["SITE_URL"] ?? null) . twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "coverPath", [], "any", false, false, false, 52));
            // line 53
            $context["href"] = (((($context["SITE_URL"] ?? null) . "/amostra/") . twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "id", [], "any", false, false, false, 53)) . "/atualizar-capa");
            // line 54
            echo "  ";
            echo twig_include($this->env, $context, "patterns/updateImageModal.html.twig");
            echo "

";
            // line 56
            $context["modalId"] = "deleteCover";
            // line 57
            $context["modalTitle"] = twig_capitalize_string_filter($this->env, "Excluir imagem do local");
            // line 58
            $context["href"] = (((($context["SITE_URL"] ?? null) . "/amostra/") . twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "id", [], "any", false, false, false, 58)) . "/deletar-capa");
            // line 59
            echo "  ";
            echo twig_include($this->env, $context, "patterns/deleteImageModal.html.twig");
            echo "

";
            // line 61
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "fitoplancton", [], "any", false, false, false, 61));
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
            foreach ($context['_seq'] as $context["_key"] => $context["taxon"]) {
                // line 62
                if (twig_get_attribute($this->env, $this->source, $context["taxon"], "image", [], "any", false, false, false, 62)) {
                    // line 63
                    echo "
";
                    // line 64
                    $context["modalId"] = ("updateImage_" . twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 64));
                    // line 65
                    $context["modalTitle"] = twig_capitalize_string_filter($this->env, "Alterar imagem do táxon");
                    // line 66
                    $context["src"] = twig_get_attribute($this->env, $this->source, $context["taxon"], "image", [], "any", false, false, false, 66);
                    // line 67
                    $context["href"] = ((((($context["SITE_URL"] ?? null) . "/amostra/") . twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "id", [], "any", false, false, false, 67)) . "/atualizar-imagem/") . twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 67));
                    // line 68
                    echo "  
  ";
                    // line 69
                    echo twig_include($this->env, $context, "patterns/updateImageModal.html.twig");
                    echo "

";
                    // line 71
                    $context["modalId"] = ("deleteImage_" . twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 71));
                    // line 72
                    $context["modalTitle"] = twig_capitalize_string_filter($this->env, "Excluir imagem do táxon");
                    // line 73
                    $context["href"] = ((((($context["SITE_URL"] ?? null) . "/amostra/") . twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "id", [], "any", false, false, false, 73)) . "/deletar-imagem/") . twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 73));
                    // line 74
                    echo "  ";
                    echo twig_include($this->env, $context, "patterns/deleteImageModal.html.twig");
                    echo "

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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['taxon'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 79
        echo "  </div>
</div>

";
    }

    // line 84
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 85
        echo "<script src=\"";
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/js/sampleForm.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "pages/samples/formManualInsert.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  239 => 85,  235 => 84,  228 => 79,  208 => 74,  206 => 73,  204 => 72,  202 => 71,  197 => 69,  194 => 68,  192 => 67,  190 => 66,  188 => 65,  186 => 64,  183 => 63,  181 => 62,  164 => 61,  158 => 59,  156 => 58,  154 => 57,  152 => 56,  146 => 54,  144 => 53,  142 => 52,  140 => 51,  138 => 50,  136 => 49,  131 => 47,  126 => 45,  122 => 44,  119 => 43,  116 => 41,  113 => 39,  111 => 38,  100 => 32,  89 => 26,  75 => 17,  71 => 15,  64 => 11,  61 => 10,  59 => 9,  54 => 6,  50 => 5,  45 => 1,  43 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/samples/formManualInsert.html.twig", "/shared/httpd/portal/app/views/pages/samples/formManualInsert.html.twig");
    }
}
