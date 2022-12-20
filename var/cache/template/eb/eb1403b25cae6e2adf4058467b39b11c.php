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

/* componnents/navbar/registers.html.twig */
class __TwigTemplate_bd1646b967f7aca7b18d0161938b4a3f extends Template
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
        echo "<nav class=\"bg-light col border-end min-vh-100\">
    <h6 class=\"d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted\">
        <span>Registros salvos</span>
        <a class=\"d-flex align-items-center text-muted\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/novo\">
            <span data-feather=\"plus-circle\"></span>
        </a>
    </h6>
    <ul class=\"nav flex-column ml-1\">
        ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["registerNavData"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["registerNav"]) {
            echo "        
            ";
            // line 10
            echo twig_include($this->env, $context, "patterns/registerNavItem.html.twig");
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['registerNav'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "        ";
        if ((($context["role"] ?? null) == "curador")) {
            // line 13
            echo "        <li class=\"nav-item ml-2\">
            ";
            // line 14
            $context["class"] = "nav-link d-flex justify-content-between text-dark fw-lighter d-flex justify-content-between";
            // line 15
            echo "            <a class=\"";
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
            echo "/curadoria\">
                <div>
                    <i data-feather=\"inbox\"></i>
                    &nbsp;&nbsp;Curadoria
                </div>
            </a>
        </li>
        ";
        }
        // line 23
        echo "        ";
        if ((($context["role"] ?? null) == "administrador")) {
            // line 24
            echo "        <li class=\"nav-item ml-2\">
            ";
            // line 25
            $context["class"] = "nav-link d-flex justify-content-between text-dark fw-lighter d-flex justify-content-between";
            // line 26
            echo "            <a class=\"";
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
            echo "/usuarios\">
                <div>
                    <i data-feather=\"users\"></i>
                    &nbsp;&nbsp;Usuarios
                </div>
            </a>
        </li>
        ";
        }
        // line 34
        echo "    </ul>
</nav>
";
    }

    public function getTemplateName()
    {
        return "componnents/navbar/registers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 34,  115 => 26,  113 => 25,  110 => 24,  107 => 23,  93 => 15,  91 => 14,  88 => 13,  85 => 12,  69 => 10,  50 => 9,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "componnents/navbar/registers.html.twig", "/shared/httpd/portal/app/views/componnents/navbar/registers.html.twig");
    }
}
