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

/* templates/registers.html.twig */
class __TwigTemplate_c31eea156a625604924cb5bb1bd0999e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'main' => [$this, 'block_main'],
            'script' => [$this, 'block_script'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"pt-BR\">
    <head>
        ";
        // line 4
        echo twig_include($this->env, $context, "componnents/head/registers.html.twig");
        echo "
        <title> ";
        // line 5
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, ($context["SITE_NAME"] ?? null), "html", null, true);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('head', $context, $blocks);
        // line 7
        echo "    </head>
    <body class=\"bg-light\">
        ";
        // line 9
        echo twig_include($this->env, $context, "componnents/header/registers.html.twig");
        echo "
        <div class=\"container-fluid\">
            <div class=\"row\">
                ";
        // line 12
        echo twig_include($this->env, $context, "componnents/navbar/registers.html.twig");
        echo " 
                <main role=\"main\" class=\"bg-white col-md-9 ms-sm-auto col-lg-10 px-md-4\">
                    ";
        // line 14
        $this->displayBlock('main', $context, $blocks);
        // line 15
        echo "                </main>
            </div>
        </div>
        ";
        // line 18
        echo twig_include($this->env, $context, "componnents/footer/registers.html.twig");
        echo "

        ";
        // line 20
        $this->displayBlock('script', $context, $blocks);
        // line 21
        echo "        
        <script src=\"https://unpkg.com/feather-icons/dist/feather.min.js\"></script>
        <script>
            feather.replace()
        </script>
  </body>
</html>";
    }

    // line 6
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 14
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 20
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "templates/registers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 20,  102 => 14,  96 => 6,  86 => 21,  84 => 20,  79 => 18,  74 => 15,  72 => 14,  67 => 12,  61 => 9,  57 => 7,  55 => 6,  49 => 5,  45 => 4,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templates/registers.html.twig", "/shared/httpd/portal/app/views/templates/registers.html.twig");
    }
}
