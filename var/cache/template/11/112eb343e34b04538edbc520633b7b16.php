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

/* pages/registers/formRegister.html.twig */
class __TwigTemplate_5d5a2244e72abbad9e33be190a034e13 extends Template
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
        // line 2
        $context["title"] = twig_capitalize_string_filter($this->env, "Cadastro de ocorrência");
        // line 1
        $this->parent = $this->loadTemplate("templates/registrationForm.html.twig", "pages/registers/formRegister.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "<div class=\"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom\">
  <h1 class=\"h2\">Registro de coleta</h1>
</div>

<ul class=\"nav nav-tabs\">
  <li class=\"nav-item mx-1\">
    <a role=\"button\" id=\"tabGeral\" class=\"nav-link active\" aria-current=\"page\" href=\"#\">Geral</a>
  </li>
  <li class=\"nav-item mx-1\">
    <a role=\"button\" id=\"tabColetas\" class=\"nav-link disabled\">Coletas</a>
  </li>
</ul>
<form action=\"";
        // line 17
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/salvar\" method=\"post\" class=\"bg-white mt-5 \">
  <div class=\"row g-5 pb-2 bg-white\">
    <div id=\"formGeral\" class=\"col-md-7 col-lg-8\">
      <p class=\"h5\">Informações gerais do registro</p>
      <div class=\"col-12\">
        <label for=\"registerName\" class=\"form-label mt-2\">Nome do registro</label>
        <input type=\"text\" class=\"form-control\" id=\"registerName\" name=\"registerName\" placeholder='Ex: \"monitoramento da praia X\", \"Estudo Y\", \"Coletas Z\".' value=\"\" required>
      </div>
      
      <div class=\"col-12\">
        <label for=\"description\" class=\"form-label mt-2\">
          Descrição do registro (Ex: Motivações, objetivos, equipamentos, metodologia)
        </label>
        <textarea type=\"text\" class=\"form-control\" id=\"description\" name=\"description\" rows=\"3\"></textarea>
      </div>

      <div class=\"col-12\">
        <label for=\"registerName\" class=\"form-label mt-2\">Referência (opcional)</label>
        <input type=\"text\" class=\"form-control\" id=\"reference\" name=\"reference\" placeholder='Ex: \"Laboratório X\", \"https://example.com\" , referência bibliográfica' value=\"\">
      </div>

      <hr class=\"my-4 my-4\">
      <button type=\"button\" class=\"w-100 btn btn-primary mb-4\" data-bs-toggle=\"modal\" data-bs-target=\"#staticBackdrop\">
        Salvar dados e continar o cadastro
      </button>

      <div class=\"modal fade\" id=\"staticBackdrop\" data-bs-backdrop=\"static\" data-bs-keyboard=\"false\" tabindex=\"-1\" aria-labelledby=\"staticBackdropLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-dialog-centered modal-dialog-scrollable\" style=\"width: 50vw;\">
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <h1 class=\"modal-title fs-5\" id=\"staticBackdropLabel\">Atenção!</h1>
              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
              Para continuar o cadastro, você confirma estar de acordo com os <a href=\"";
        // line 51
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/termos/responsabilidades-do-usuario\" target=\"_blank\" rel=\"noopener noreferrer\">Termos de Responsabilidades do Usuário</a>, assim como exibido a seguir:
              <hr>
              ";
        // line 53
        echo twig_include($this->env, $context, "pages/terms/UserResponsibility-2022.html.twig");
        echo "
            </div>
            <div class=\"modal-footer\">
              <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Não concordo</button>
              <button type=\"submit\" class=\"btn btn-primary\">Concordo</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "pages/registers/formRegister.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 53,  104 => 51,  67 => 17,  53 => 5,  49 => 4,  44 => 1,  42 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/registers/formRegister.html.twig", "/shared/httpd/portal/app/views/pages/registers/formRegister.html.twig");
    }
}
