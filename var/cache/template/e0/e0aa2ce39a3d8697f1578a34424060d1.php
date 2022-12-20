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

/* componnents/header/home.html.twig */
class __TwigTemplate_ce8a78de321aeb79bb617a505a700b9f extends Template
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
        echo "<header>
  <nav class=\"navbar navbar-light  bg-primary flex-md-nowrap p-0 shadow px-4 py-1\">
    <div class=\"pl-4 border-bottom mr-0\" style=\"margin-top: .7em;\">
      <a class=\"navbar-brand col-sm-3 col-md-3 mr-0\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "\">
        ";
        // line 5
        echo twig_escape_filter($this->env, ($context["SITE_NAME"] ?? null), "html", null, true);
        echo "
      </a>
    </div>
    <div class=\"w-100 d-flex justify-content-start\">
      <ul class=\"navbar-nav nav-tabs w-100 justify-content-end mr-2 d-flex flex-row\" style=\"\">
        <li class=\"nav-item mx-1\">
          ";
        // line 11
        $context["text"] = "página inicial";
        // line 12
        echo "          ";
        if ((($context["homeActivated"] ?? null) == true)) {
            // line 13
            echo "            <a class=\"nav-link px-2 active\" aria-current=\"page\" href=\"#\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ($context["text"] ?? null)), "html", null, true);
            echo "</a>
          ";
        } else {
            // line 15
            echo "            <a class=\"nav-link px-2\" href=\"";
            echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ($context["text"] ?? null)), "html", null, true);
            echo "</a>
          ";
        }
        // line 17
        echo "        </li>
        <li class=\"nav-item mx-1\">
          ";
        // line 19
        $context["text"] = "contribua";
        // line 20
        echo "          ";
        if ((($context["loginActivated"] ?? null) == true)) {
            // line 21
            echo "            <a class=\"nav-link px-2 active\" aria-current=\"page\" href=\"#\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ($context["text"] ?? null)), "html", null, true);
            echo "</a>
          ";
        } else {
            // line 23
            echo "            <a class=\"nav-link px-2\" href=\"";
            echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
            echo "/login\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ($context["text"] ?? null)), "html", null, true);
            echo "</a>
          ";
        }
        // line 25
        echo "        </li>
        <li class=\"nav-item mx-1\">
          ";
        // line 27
        $context["text"] = "Sobre";
        // line 28
        echo "          ";
        if ((($context["aboutActivated"] ?? null) == true)) {
            // line 29
            echo "            <a class=\"nav-link px-2 active\" aria-current=\"page\" href=\"#\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ($context["text"] ?? null)), "html", null, true);
            echo "</a>
          ";
        } else {
            // line 31
            echo "            <a class=\"nav-link px-2\" href=\"";
            echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
            echo "/sobre\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ($context["text"] ?? null)), "html", null, true);
            echo "</a>
          ";
        }
        // line 33
        echo "        </li>
      </ul>
    </div>
  </nav>
</header>";
    }

    public function getTemplateName()
    {
        return "componnents/header/home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 33,  112 => 31,  106 => 29,  103 => 28,  101 => 27,  97 => 25,  89 => 23,  83 => 21,  80 => 20,  78 => 19,  74 => 17,  66 => 15,  60 => 13,  57 => 12,  55 => 11,  46 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "componnents/header/home.html.twig", "/shared/httpd/portal/app/views/componnents/header/home.html.twig");
    }
}
