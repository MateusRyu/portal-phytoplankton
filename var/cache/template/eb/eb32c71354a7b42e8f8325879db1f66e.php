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

/* pages/home/index.html.twig */
class __TwigTemplate_b5f362c25f4f51fa0fe55b4f46841eec extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "templates/default.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        $context["homeActivated"] = "actived";
        // line 1
        $this->parent = $this->loadTemplate("templates/default.html.twig", "pages/home/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <h1 class=\"invisible\">Mapa de fitoplâncton</h1>
    <div class=\"position-relative m-0 p-0 placeholder-glow\">
        ";
        // line 8
        echo twig_include($this->env, $context, "patterns/popupInfo.html.twig");
        echo "
        <section id=\"map\" class=\"map w-100\"></section>
        ";
        // line 11
        echo "    </div>

    <script src=\"";
        // line 13
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/vendor/ol/v7.1.0-package/dist/ol.js\"></script> 
    <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/vendor/ol/v7.1.0-package/ol.css\">
    <script src=\"https://unpkg.com/feather-icons/dist/feather.min.js\"></script>
    <script>
        feather.replace()
    </script>
    <link rel=\"stylesheet\" href=\"./css/map.css\">
    <script src=\"./js/map.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "pages/home/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 14,  66 => 13,  62 => 11,  57 => 8,  53 => 6,  49 => 5,  44 => 1,  42 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/home/index.html.twig", "/shared/httpd/portal/app/views/pages/home/index.html.twig");
    }
}
