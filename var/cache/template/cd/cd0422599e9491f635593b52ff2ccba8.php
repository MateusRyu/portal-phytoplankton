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

/* pages/registers/index.html.twig */
class __TwigTemplate_135df32978fd83a9dc5be1dd4e515ab6 extends Template
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
        return "templates/registers.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        $context["title"] = twig_capitalize_string_filter($this->env, "Gerenciador de registro de ocorrência");
        // line 4
        $context["projetosActived"] = "active";
        // line 1
        $this->parent = $this->loadTemplate("templates/registers.html.twig", "pages/registers/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "  <div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
    <h1 class=\"h2\">Gerenciador de registro de ocorrência</h1>
    <div class=\"btn-toolbar mb-2 mb-md-0\">
      <div class=\"btn-group mr-2\">
        ";
        // line 11
        $context["text"] = twig_capitalize_string_filter($this->env, "novo registro <span data-feather=\"plus-circle\"></span>");
        // line 12
        echo "        ";
        $context["link"] = (($context["SITE_URL"] ?? null) . "/registros/novo");
        // line 13
        echo "        ";
        echo twig_include($this->env, $context, "componnents/buttons/linkPrimary.html.twig");
        echo "
      </div>
    </div>
  </div>

  <h3 class=\"h6 text-muted border-bottom\">Recentes</h3>
  <div class=\"album py-1 bg-light\">
    <div class=\"container\">
      <div class=\"row\">
      ";
        // line 22
        if (($context["recents"] ?? null)) {
            // line 23
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["recents"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["register"]) {
                echo "        
          ";
                // line 24
                echo twig_include($this->env, $context, "patterns/registerCard.html.twig");
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['register'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "      ";
        } else {
            echo "      
        <div class=\"bg-white p-4 rounded\">
          <p class=\"\">
            Nenhum registro de amostra encontrado. Clique no botão \"novo registro\" para cadastrar um novo registro!
          </p>
        </div>
      ";
        }
        // line 33
        echo "      </div>
    </div>
  </div>

  <h3 class=\"h6 text-muted border-bottom\">Todos</h3>
  <div class=\"album py-5 bg-light\">
    <div class=\"container\">
      <div class=\"row\">
        ";
        // line 41
        if (($context["registers"] ?? null)) {
            // line 42
            echo "          ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["registers"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["register"]) {
                echo "        
            ";
                // line 43
                echo twig_include($this->env, $context, "patterns/registerCard.html.twig");
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['register'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "        ";
        }
        // line 46
        echo "      </div>
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "pages/registers/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 46,  176 => 45,  160 => 43,  140 => 42,  138 => 41,  128 => 33,  117 => 26,  101 => 24,  81 => 23,  79 => 22,  66 => 13,  63 => 12,  61 => 11,  55 => 7,  51 => 6,  46 => 1,  44 => 4,  42 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/registers/index.html.twig", "/shared/httpd/portal/app/views/pages/registers/index.html.twig");
    }
}
