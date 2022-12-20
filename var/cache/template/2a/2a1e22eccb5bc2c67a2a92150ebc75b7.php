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

/* patterns/registerCard.html.twig */
class __TwigTemplate_d6a5edfdc0c02a3b2759ddb02a052cf0 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"col-md-4\">
    <div class=\"card mb-4 shadow-sm\">
        <div class=\"card-body\">
            <h5>";
        // line 4
        echo twig_get_attribute($this->env, $this->source, ($context["register"] ?? null), "title", [], "any", false, false, false, 4);
        echo "</h5>
            <div>
";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["register"] ?? null), "tags", [], "any", false, false, false, 6));
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
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 7
            echo "
";
            // line 8
            $context["text"] = twig_capitalize_string_filter($this->env, $context["tag"]);
            // line 9
            if (($context["tag"] == "rascunho")) {
                // line 10
                echo "                    ";
                echo twig_include($this->env, $context, "componnents/badges/secondary.html.twig");
                echo "
";
            }
            // line 12
            echo "
";
            // line 13
            if (($context["tag"] == "aprovado")) {
                // line 14
                echo "                    ";
                echo twig_include($this->env, $context, "componnents/badges/success.html.twig");
                echo "
";
            }
            // line 16
            echo "
";
            // line 17
            if (($context["tag"] == "rejeitado")) {
                // line 18
                echo "                    ";
                echo twig_include($this->env, $context, "componnents/badges/danger.html.twig");
                echo "
";
            }
            // line 20
            echo "
";
            // line 21
            if (($context["tag"] == "em curadoria")) {
                // line 22
                echo "                    ";
                echo twig_include($this->env, $context, "componnents/badges/warning.html.twig");
                echo "
";
            }
            // line 24
            echo "
";
            // line 25
            if (($context["tag"] == "compartilhado")) {
                // line 26
                echo "                    ";
                echo twig_include($this->env, $context, "componnents/badges/info.html.twig");
                echo "
";
            }
            // line 28
            echo "    
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "                <p class=\"card-text mt-2 border-top\">
                    ";
        // line 31
        (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["register"] ?? null), "description", [], "any", false, false, false, 31)) > 250)) ? (print (twig_escape_filter($this->env, (twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["register"] ?? null), "description", [], "any", false, false, false, 31), 0, 250) . "..."), "html", null, true))) : (print (twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["register"] ?? null), "description", [], "any", false, false, false, 31), 0, 250))));
        echo "
                </p>
                <div class=\"d-flex justify-content-between align-items-center mb-2\">
                    <div class=\"btn-group\">

                    ";
        // line 41
        echo "
                    ";
        // line 42
        $context["text"] = twig_capitalize_string_filter($this->env, "editar");
        // line 43
        echo "                    ";
        $context["link"] = (((($context["SITE_URL"] ?? null) . "/registros/") . twig_get_attribute($this->env, $this->source, ($context["register"] ?? null), "id", [], "any", false, false, false, 43)) . "/editar");
        // line 44
        echo "                        ";
        echo twig_include($this->env, $context, "componnents/buttons/linkSecondary.html.twig");
        echo "

                        <button type=\"button\" class=\"btn btn-sm btn-outline-danger\" data-bs-toggle=\"modal\" data-bs-target=\"#confirmDelete";
        // line 46
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["register"] ?? null), "id", [], "any", false, false, false, 46), "html", null, true);
        echo "\">
                            Excluir
                        </button>
                    </div>
                </div>
            </div>
            <div class=\"container w-100 mt-2 border-top\">
                ";
        // line 53
        if (twig_get_attribute($this->env, $this->source, ($context["register"] ?? null), "edit", [], "any", false, false, false, 53)) {
            // line 54
            echo "                    <small class=\"text-muted\">Modificado em: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["register"] ?? null), "edit", [], "any", false, false, false, 54), "html", null, true);
            echo "</small>
                ";
        }
        // line 56
        echo "            </div>
        </div>
    </div>
</div>

<div class=\"modal fade\" id=\"confirmDelete";
        // line 61
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["register"] ?? null), "id", [], "any", false, false, false, 61), "html", null, true);
        echo "\" tabindex=\"-1\" aria-labelledby=\"confirmDelete";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["register"] ?? null), "id", [], "any", false, false, false, 61), "html", null, true);
        echo "\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h1 class=\"modal-title fs-5\" id=\"exampleModalLabel\">Atenção!</h1>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      </div>
      <div class=\"modal-body\">
        Você realmente deseja excluir o registro \"<strong>";
        // line 69
        echo twig_get_attribute($this->env, $this->source, ($context["register"] ?? null), "title", [], "any", false, false, false, 69);
        echo "</strong>\"? Após confirmar, a ação não poderá ser desfeita.
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-sm btn-secondary\" data-bs-dismiss=\"modal\">Cancelar</button>
";
        // line 73
        $context["text"] = "Excluir";
        // line 74
        $context["link"] = (((($context["SITE_URL"] ?? null) . "/registros/") . twig_get_attribute($this->env, $this->source, ($context["register"] ?? null), "id", [], "any", false, false, false, 74)) . "/excluir");
        // line 75
        echo "        ";
        echo twig_include($this->env, $context, "componnents/buttons/linkDanger.html.twig");
        echo "
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "patterns/registerCard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 75,  208 => 74,  206 => 73,  199 => 69,  186 => 61,  179 => 56,  173 => 54,  171 => 53,  161 => 46,  155 => 44,  152 => 43,  150 => 42,  147 => 41,  139 => 31,  136 => 30,  121 => 28,  115 => 26,  113 => 25,  110 => 24,  104 => 22,  102 => 21,  99 => 20,  93 => 18,  91 => 17,  88 => 16,  82 => 14,  80 => 13,  77 => 12,  71 => 10,  69 => 9,  67 => 8,  64 => 7,  47 => 6,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "patterns/registerCard.html.twig", "/shared/httpd/portal/app/views/patterns/registerCard.html.twig");
    }
}
