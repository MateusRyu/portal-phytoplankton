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

/* pages/registers/formEditRegister.html.twig */
class __TwigTemplate_f152e173beaed301a2147271ff205ff4 extends Template
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
        // line 2
        $context["title"] = twig_capitalize_string_filter($this->env, "Cadastro de ocorrência");
        // line 1
        $this->parent = $this->loadTemplate("templates/registrationForm.html.twig", "pages/registers/formEditRegister.html.twig", 1);
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
    <a role=\"button\" id=\"tabColetas\" class=\"nav-link\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "/amostras\">Coletas</a>
  </li>
</ul>

<form action=\"";
        // line 18
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "/atualizar\" method=\"post\" class=\"container bg-white p-2\">
  <div class=\"row  bg-white\">
    <div id=\"formGeral\" class=\"col-md-7 col-lg-8\">
      <p class=\"h5\">Informações gerais do registro</p>
      <div class=\"col-12\">
        <label for=\"registerName\" class=\"form-label mt-2\">Nome do registro</label>
        <input type=\"text\" class=\"form-control\" id=\"registerName\" name=\"registerName\" placeholder='Ex: \"monitoramento da praia X\", \"Estudo Y\", \"Coletas Z\".' value=\"";
        // line 24
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\" required>
      </div>
      
      <div class=\"col-12\">
        <label for=\"description\" class=\"form-label mt-2\">
          Descrição do registro (Ex: Motivações, objetivos, equipamentos, metodologia)
        </label>
        <textarea type=\"text\" class=\"form-control\" id=\"description\" name=\"description\" style=\"height: 8vw\" required>";
        // line 31
        echo twig_escape_filter($this->env, ($context["description"] ?? null), "html", null, true);
        echo "</textarea>
      </div>

      <div class=\"col-12\">
        <label for=\"registerName\" class=\"form-label mt-2\">Referência (opcional)</label>
        <input type=\"text\" class=\"form-control\" id=\"reference\" name=\"reference\" placeholder='Ex: \"Laboratório X\", \"https://example.com\" , referência bibliográfica' value=\"";
        // line 36
        echo twig_escape_filter($this->env, ($context["reference"] ?? null), "html", null, true);
        echo "\">
      </div>
      
      <hr class=\"my-4 my-4\">

      <button type=\"button\" onclick=\"showTerm()\" class=\"w-100 btn btn-primary btn-lg\">
        Salvar dados e continar o cadastro
      </button>

      <dialog id=\"term\" class=\"h-75 w-75\">
        <div class=\"d-flex flex-column justify-content-around w-100 h-100\">
          <span class=\"border-bottom py-2\">
            <h2 class=\"text-center\">
              Atenção!
            </h2>
            Para continuar o cadastro, você confirma estar de acordo com os <a href=\"";
        // line 51
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/termos/responsabilidades-do-usuario\" target=\"_blank\" rel=\"noopener noreferrer\">Termos de Responsabilidades do Usuário</a>, assim como exibido a seguir:
          </span>
          <iframe src=\"";
        // line 53
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/termos/responsabilidades-do-usuario\" alt=\"Termos de Responsabilidades do Usuário\" class=\"h-50 w-100\">
            ";
        // line 54
        echo twig_include($this->env, $context, "pages/terms/UserResponsibility-2022.html.twig");
        echo "
          </iframe>
          <div class=\"border-top d-flex flex-row justify-content-around py-2 w-100\">
            <div id=\"formAlert\" class=\"d-none alert alert-danger\" role=\"alert\">
              * É necessário preencher o formulário corretamente para prosseguir.
            </div>
            <button type=\"button\" onclick=\"closeTerm()\" class=\"btn btn-secondary ml-auto px-2 mx-1\">
              Não concordo
            </button>
            <button type=\"submit\" onclick=\"showAlert()\" class=\" btn btn-primary px-2 mx-1\">Concordo</button>
          </div>
        </div>        
      </dialog>
    </div>
  </div>
</form>
";
    }

    // line 72
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 73
        echo "<script>
  function showTerm() {
    const modal = document.getElementById(\"term\");
    modal.showModal()
  }

  function closeTerm() {
    const modal = document.getElementById(\"term\");
    modal.close()
  }

  function showAlert() {
    const alert = document.getElementById(\"formAlert\"); 
    setTimeout(() => {
      alert.classList.remove(\"d-none\");
    }, \"1000\") // delay for 1 seconds
  }
</script>
";
    }

    public function getTemplateName()
    {
        return "pages/registers/formEditRegister.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 73,  151 => 72,  130 => 54,  126 => 53,  121 => 51,  103 => 36,  95 => 31,  85 => 24,  74 => 18,  65 => 14,  54 => 5,  50 => 4,  45 => 1,  43 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/registers/formEditRegister.html.twig", "/shared/httpd/portal/app/views/pages/registers/formEditRegister.html.twig");
    }
}
