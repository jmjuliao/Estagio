<?php
session_start();
if (!empty($_SESSION['nivelAcesso']) && ($_SESSION['nivelAcesso'] == 'al')){
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                   ATTENTION!
 * If you see this message in your browser (Internet Explorer, Mozilla Firefox, Google Chrome, etc.)
 * this means that PHP is not properly installed on your web server. Please refer to the PHP manual
 * for more details: http://php.net/manual/install.php
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */


    include_once dirname(__FILE__) . '/' . 'components/utils/check_utils.php';
    CheckPHPVersion();
    CheckTemplatesCacheFolderIsExistsAndWritable();


    include_once dirname(__FILE__) . '/' . 'phpgen_settings.php';
    include_once dirname(__FILE__) . '/' . 'database_engine/mysql_engine.php';
    include_once dirname(__FILE__) . '/' . 'components/page.php';


    function GetConnectionOptions()
    {
        $result = GetGlobalConnectionOptions();
        $result['client_encoding'] = 'utf8';
        GetApplication()->GetUserAuthorizationStrategy()->ApplyIdentityToConnectionOptions($result);
        return $result;
    }


    // OnGlobalBeforePageExecute event handler


    // OnBeforePageExecute event handler



    class estagioPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`estagio`');
            $field = new StringField('matricula');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('cnpj');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('obrigatorio');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('professor_orientador');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('nome_supervisor_estagio');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('email_supervisor_estagio');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('tel_supervidor_estagio');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new DateField('data_inicio');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('hora_inicio');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new DateField('data_fim');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('hora_fim');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('ch_acumulada');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('termo_compromisso');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('apolice_seguro');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new DateField('validade_seguro');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('cia_seguro');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('entrega_relatotio_final');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('visita');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('contato_supervidor');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('realizou_plano_estagio');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('interesse_comprometimento');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('formacao');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('indica_cedente');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_instalacoes');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_equipamentos');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_seguranca');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_relacionamento');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_clima_organizacional');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_orientacao_supervisor');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_supervisao_professor');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avalicao_contribuicao_crescimento');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_aplicacao_conhecimento');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avalicao_opiniao_estagio');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_participacao_estagio');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_capacidade_profissional');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('obtencao_estagio');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('oferece_capacitacao_profissional');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('continuar_area');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('motivo_continuar_area');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('pontos_positivo_negativos');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('conhecimentos_estagios');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('atividades_desenvolvidas');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('contribuicao_tecnica');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('conhecimento_x_atividades');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('sugestoes');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('atividade_estagiario');
            $this->dataset->AddField($field, false);
            $field = new StringField('equipamentos_utilizados');
            $this->dataset->AddField($field, false);
            $field = new StringField('sugestao_ensino_instituicao');
            $this->dataset->AddField($field, false);
            $field = new StringField('dificuldades_estagio');
            $this->dataset->AddField($field, false);
            $field = new StringField('pontualidade');
            $this->dataset->AddField($field, false);
            $field = new StringField('assiduidade');
            $this->dataset->AddField($field, false);
            $field = new StringField('motivacao');
            $this->dataset->AddField($field, false);
            $field = new StringField('iniciativa');
            $this->dataset->AddField($field, false);
            $field = new StringField('relacionamento');
            $this->dataset->AddField($field, false);
            $field = new StringField('adaptabilidade');
            $this->dataset->AddField($field, false);
            $field = new StringField('cooperacao');
            $this->dataset->AddField($field, false);
            $field = new StringField('objetividade');
            $this->dataset->AddField($field, false);
            $field = new StringField('produtividade');
            $this->dataset->AddField($field, false);
            $field = new StringField('empatia');
            $this->dataset->AddField($field, false);
            $field = new StringField('flexibilidade');
            $this->dataset->AddField($field, false);
            $field = new StringField('criativade');
            $this->dataset->AddField($field, false);
            $field = new StringField('equilibrio_emocional');
            $this->dataset->AddField($field, false);
            $field = new StringField('conceito_final');
            $this->dataset->AddField($field, false);
            $field = new StringField('parecer');
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('matricula', 'aluno', new StringField('matricula'), new StringField('nome_aluno', 'matricula_nome_aluno', 'matricula_nome_aluno_aluno'), 'matricula_nome_aluno_aluno');
            $this->dataset->AddLookupField('cnpj', 'empresa', new StringField('cnpj'), new StringField('nome_empresa', 'cnpj_nome_empresa', 'cnpj_nome_empresa_empresa'), 'cnpj_nome_empresa_empresa');
            $this->dataset->AddLookupField('professor_orientador', 'professor', new StringField('siape'), new StringField('nome_professor', 'professor_orientador_nome_professor', 'professor_orientador_nome_professor_professor'), 'professor_orientador_nome_professor_professor');
        }

        protected function DoPrepare() {

        }

        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);

            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(20);
            $result->AddPageNavigator($partitionNavigator);

            return $result;
        }

        public function GetPageList()
        {
            $currentPageCaption = $this->GetShortCaption();
            $result = new PageList($this);
            $result->AddGroup($this->RenderText('Default'));
            if (GetCurrentUserGrantForDataSource('estagio')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Estagio'), 'estagio.php', $this->RenderText('Estagio'), $currentPageCaption == $this->RenderText('Estagio'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('estagio_atividade')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Estagio Atividade'), 'estagio_atividade.php', $this->RenderText('Estagio Atividade'), $currentPageCaption == $this->RenderText('Estagio Atividade'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('relatorio_periodico')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Relatorio Periodico'), 'relatorio_periodico.php', $this->RenderText('Relatorio Periodico'), $currentPageCaption == $this->RenderText('Relatorio Periodico'), false, $this->RenderText('Default')));

            if ( HasAdminPage() && GetApplication()->HasAdminGrantForCurrentUser() ) {
              $result->AddGroup('Admin area');
              $result->AddPage(new PageLink($this->GetLocalizerCaptions()->GetMessageString('AdminPage'), 'phpgen_admin.php', $this->GetLocalizerCaptions()->GetMessageString('AdminPage'), false, false, 'Admin area'));
            }
            return $result;
        }

        protected function CreateRssGenerator()
        {
            return null;
        }

        protected function CreateGridSearchControl(Grid $grid)
        {
            $grid->UseFilter = true;
            $grid->SearchControl = new SimpleSearch('estagiossearch', $this->dataset,
                array('matricula_nome_aluno', 'cnpj_nome_empresa', 'obrigatorio', 'professor_orientador_nome_professor', 'nome_supervisor_estagio', 'email_supervisor_estagio', 'tel_supervidor_estagio', 'data_inicio', 'hora_inicio', 'data_fim', 'hora_fim', 'ch_acumulada', 'termo_compromisso', 'apolice_seguro', 'validade_seguro', 'cia_seguro', 'entrega_relatotio_final', 'visita', 'contato_supervidor', 'realizou_plano_estagio', 'interesse_comprometimento', 'formacao', 'indica_cedente', 'avaliacao_instalacoes', 'avaliacao_equipamentos', 'avaliacao_seguranca', 'avaliacao_relacionamento', 'avaliacao_clima_organizacional', 'avaliacao_orientacao_supervisor', 'avaliacao_supervisao_professor', 'avalicao_contribuicao_crescimento', 'avaliacao_aplicacao_conhecimento', 'avalicao_opiniao_estagio', 'avaliacao_participacao_estagio', 'avaliacao_capacidade_profissional', 'obtencao_estagio', 'oferece_capacitacao_profissional', 'continuar_area', 'motivo_continuar_area', 'pontos_positivo_negativos', 'conhecimentos_estagios', 'atividades_desenvolvidas', 'contribuicao_tecnica', 'conhecimento_x_atividades', 'sugestoes', 'atividade_estagiario', 'equipamentos_utilizados', 'sugestao_ensino_instituicao', 'dificuldades_estagio', 'pontualidade', 'assiduidade', 'motivacao', 'iniciativa', 'relacionamento', 'adaptabilidade', 'cooperacao', 'objetividade', 'produtividade', 'empatia', 'flexibilidade', 'criativade', 'equilibrio_emocional', 'conceito_final', 'parecer'),
                array($this->RenderText('Matricula'), $this->RenderText('Cnpj'), $this->RenderText('Obrigatorio'), $this->RenderText('Professor Orientador'), $this->RenderText('Nome Supervisor Estagio'), $this->RenderText('Email Supervisor Estagio'), $this->RenderText('Tel Supervidor Estagio'), $this->RenderText('Data Inicio'), $this->RenderText('Hora Inicio'), $this->RenderText('Data Fim'), $this->RenderText('Hora Fim'), $this->RenderText('Ch Acumulada'), $this->RenderText('Termo Compromisso'), $this->RenderText('Apolice Seguro'), $this->RenderText('Validade Seguro'), $this->RenderText('Cia Seguro'), $this->RenderText('Entrega Relatotio Final'), $this->RenderText('Visita'), $this->RenderText('Contato Supervidor'), $this->RenderText('Realizou Plano Estagio'), $this->RenderText('Interesse Comprometimento'), $this->RenderText('Formacao'), $this->RenderText('Indica Cedente'), $this->RenderText('Avaliacao Instalacoes'), $this->RenderText('Avaliacao Equipamentos'), $this->RenderText('Avaliacao Seguranca'), $this->RenderText('Avaliacao Relacionamento'), $this->RenderText('Avaliacao Clima Organizacional'), $this->RenderText('Avaliacao Orientacao Supervisor'), $this->RenderText('Avaliacao Supervisao Professor'), $this->RenderText('Avalicao Contribuicao Crescimento'), $this->RenderText('Avaliacao Aplicacao Conhecimento'), $this->RenderText('Avalicao Opiniao Estagio'), $this->RenderText('Avaliacao Participacao Estagio'), $this->RenderText('Avaliacao Capacidade Profissional'), $this->RenderText('Obtencao Estagio'), $this->RenderText('Oferece Capacitacao Profissional'), $this->RenderText('Continuar Area'), $this->RenderText('Motivo Continuar Area'), $this->RenderText('Pontos Positivo Negativos'), $this->RenderText('Conhecimentos Estagios'), $this->RenderText('Atividades Desenvolvidas'), $this->RenderText('Contribuicao Tecnica'), $this->RenderText('Conhecimento X Atividades'), $this->RenderText('Sugestoes'), $this->RenderText('Atividade Estagiario'), $this->RenderText('Equipamentos Utilizados'), $this->RenderText('Sugestao Ensino Instituicao'), $this->RenderText('Dificuldades Estagio'), $this->RenderText('Pontualidade'), $this->RenderText('Assiduidade'), $this->RenderText('Motivacao'), $this->RenderText('Iniciativa'), $this->RenderText('Relacionamento'), $this->RenderText('Adaptabilidade'), $this->RenderText('Cooperacao'), $this->RenderText('Objetividade'), $this->RenderText('Produtividade'), $this->RenderText('Empatia'), $this->RenderText('Flexibilidade'), $this->RenderText('Criativade'), $this->RenderText('Equilibrio Emocional'), $this->RenderText('Conceito Final'), $this->RenderText('Parecer')),
                array(
                    '=' => $this->GetLocalizerCaptions()->GetMessageString('equals'),
                    '<>' => $this->GetLocalizerCaptions()->GetMessageString('doesNotEquals'),
                    '<' => $this->GetLocalizerCaptions()->GetMessageString('isLessThan'),
                    '<=' => $this->GetLocalizerCaptions()->GetMessageString('isLessThanOrEqualsTo'),
                    '>' => $this->GetLocalizerCaptions()->GetMessageString('isGreaterThan'),
                    '>=' => $this->GetLocalizerCaptions()->GetMessageString('isGreaterThanOrEqualsTo'),
                    'ILIKE' => $this->GetLocalizerCaptions()->GetMessageString('Like'),
                    'STARTS' => $this->GetLocalizerCaptions()->GetMessageString('StartsWith'),
                    'ENDS' => $this->GetLocalizerCaptions()->GetMessageString('EndsWith'),
                    'CONTAINS' => $this->GetLocalizerCaptions()->GetMessageString('Contains')
                    ), $this->GetLocalizerCaptions(), $this, 'CONTAINS'
                );
        }

        protected function CreateGridAdvancedSearchControl(Grid $grid)
        {
            $this->AdvancedSearchControl = new AdvancedSearchControl('estagioasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->setTimerInterval(1000);
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`aluno`');
            $field = new StringField('matricula');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('nome_aluno');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cod_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('periodo');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('ano_conclusao');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('rua');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('bairro');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cidade');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('uf');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cep');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('email');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('celular');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('fixo');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('nome_aluno', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('matricula', $this->RenderText('Matricula'), $lookupDataset, 'matricula', 'nome_aluno', false, 8));

            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`empresa`');
            $field = new StringField('cnpj');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('nome_empresa');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('rua');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('bairro');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cidade');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('uf');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cep');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('contato');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('telefone');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('convenio');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('representante_legal');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cargo_representante');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('celular');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('emaiil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('registro_profissional');
            $lookupDataset->AddField($field, false);
            $field = new StringField('licenca_municipal');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('nome_empresa', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('cnpj', $this->RenderText('Cnpj'), $lookupDataset, 'cnpj', 'nome_empresa', false, 8));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('obrigatorio', $this->RenderText('Obrigatorio')));

            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`professor`');
            $field = new StringField('siape');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('nome_professor');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cod_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $lookupDataset->setOrderByField('nome_professor', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('professor_orientador', $this->RenderText('Professor Orientador'), $lookupDataset, 'siape', 'nome_professor', false, 8));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('nome_supervisor_estagio', $this->RenderText('Nome Supervisor Estagio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('email_supervisor_estagio', $this->RenderText('Email Supervisor Estagio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('tel_supervidor_estagio', $this->RenderText('Tel Supervidor Estagio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('data_inicio', $this->RenderText('Data Inicio'), 'Y-m-d'));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('hora_inicio', $this->RenderText('Hora Inicio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('data_fim', $this->RenderText('Data Fim'), 'Y-m-d'));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('hora_fim', $this->RenderText('Hora Fim')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('ch_acumulada', $this->RenderText('Ch Acumulada')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('termo_compromisso', $this->RenderText('Termo Compromisso')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('apolice_seguro', $this->RenderText('Apolice Seguro')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('validade_seguro', $this->RenderText('Validade Seguro'), 'Y-m-d'));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('cia_seguro', $this->RenderText('Cia Seguro')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('entrega_relatotio_final', $this->RenderText('Entrega Relatotio Final')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('visita', $this->RenderText('Visita')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('contato_supervidor', $this->RenderText('Contato Supervidor')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('realizou_plano_estagio', $this->RenderText('Realizou Plano Estagio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('interesse_comprometimento', $this->RenderText('Interesse Comprometimento')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('formacao', $this->RenderText('Formacao')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('indica_cedente', $this->RenderText('Indica Cedente')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_instalacoes', $this->RenderText('Avaliacao Instalacoes')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_equipamentos', $this->RenderText('Avaliacao Equipamentos')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_seguranca', $this->RenderText('Avaliacao Seguranca')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_relacionamento', $this->RenderText('Avaliacao Relacionamento')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_clima_organizacional', $this->RenderText('Avaliacao Clima Organizacional')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_orientacao_supervisor', $this->RenderText('Avaliacao Orientacao Supervisor')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_supervisao_professor', $this->RenderText('Avaliacao Supervisao Professor')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avalicao_contribuicao_crescimento', $this->RenderText('Avalicao Contribuicao Crescimento')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_aplicacao_conhecimento', $this->RenderText('Avaliacao Aplicacao Conhecimento')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avalicao_opiniao_estagio', $this->RenderText('Avalicao Opiniao Estagio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_participacao_estagio', $this->RenderText('Avaliacao Participacao Estagio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_capacidade_profissional', $this->RenderText('Avaliacao Capacidade Profissional')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('obtencao_estagio', $this->RenderText('Obtencao Estagio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('oferece_capacitacao_profissional', $this->RenderText('Oferece Capacitacao Profissional')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('continuar_area', $this->RenderText('Continuar Area')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('motivo_continuar_area', $this->RenderText('Motivo Continuar Area')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('pontos_positivo_negativos', $this->RenderText('Pontos Positivo Negativos')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('conhecimentos_estagios', $this->RenderText('Conhecimentos Estagios')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('atividades_desenvolvidas', $this->RenderText('Atividades Desenvolvidas')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('contribuicao_tecnica', $this->RenderText('Contribuicao Tecnica')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('conhecimento_x_atividades', $this->RenderText('Conhecimento X Atividades')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('sugestoes', $this->RenderText('Sugestoes')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('atividade_estagiario', $this->RenderText('Atividade Estagiario')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('equipamentos_utilizados', $this->RenderText('Equipamentos Utilizados')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('sugestao_ensino_instituicao', $this->RenderText('Sugestao Ensino Instituicao')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('dificuldades_estagio', $this->RenderText('Dificuldades Estagio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('pontualidade', $this->RenderText('Pontualidade')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('assiduidade', $this->RenderText('Assiduidade')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('motivacao', $this->RenderText('Motivacao')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('iniciativa', $this->RenderText('Iniciativa')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('relacionamento', $this->RenderText('Relacionamento')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('adaptabilidade', $this->RenderText('Adaptabilidade')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('cooperacao', $this->RenderText('Cooperacao')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('objetividade', $this->RenderText('Objetividade')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('produtividade', $this->RenderText('Produtividade')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('empatia', $this->RenderText('Empatia')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('flexibilidade', $this->RenderText('Flexibilidade')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('criativade', $this->RenderText('Criativade')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('equilibrio_emocional', $this->RenderText('Equilibrio Emocional')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('conceito_final', $this->RenderText('Conceito Final')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('parecer', $this->RenderText('Parecer')));
        }

        protected function AddOperationsColumns(Grid $grid)
        {
            $actionsBandName = 'actions';
            $grid->AddBandToBegin($actionsBandName, $this->GetLocalizerCaptions()->GetMessageString('Actions'), true);
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
            }
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
                $column->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            if ($this->GetSecurityInfo()->HasDeleteGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Delete'), OPERATION_DELETE, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
                $column->OnShow->AddListener('ShowDeleteButtonHandler', $this);
                $column->SetAdditionalAttribute('data-modal-delete', 'true');
                $column->SetAdditionalAttribute('data-delete-handler-name', $this->GetModalGridDeleteHandler());
            }
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
            }
        }

        protected function AddFieldColumns(Grid $grid)
        {
            //
            // View column for nome_aluno field
            //
            $column = new TextViewColumn('matricula_nome_aluno', 'Matricula', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for nome_empresa field
            //
            $column = new TextViewColumn('cnpj_nome_empresa', 'Cnpj', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for obrigatorio field
            //
            $column = new TextViewColumn('obrigatorio', 'Obrigatorio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for nome_professor field
            //
            $column = new TextViewColumn('professor_orientador_nome_professor', 'Professor Orientador', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for nome_supervisor_estagio field
            //
            $column = new TextViewColumn('nome_supervisor_estagio', 'Nome Supervisor Estagio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for email_supervisor_estagio field
            //
            $column = new TextViewColumn('email_supervisor_estagio', 'Email Supervisor Estagio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for tel_supervidor_estagio field
            //
            $column = new TextViewColumn('tel_supervidor_estagio', 'Tel Supervidor Estagio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for data_inicio field
            //
            $column = new DateTimeViewColumn('data_inicio', 'Data Inicio', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for hora_inicio field
            //
            $column = new TextViewColumn('hora_inicio', 'Hora Inicio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for data_fim field
            //
            $column = new DateTimeViewColumn('data_fim', 'Data Fim', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for hora_fim field
            //
            $column = new TextViewColumn('hora_fim', 'Hora Fim', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for ch_acumulada field
            //
            $column = new TextViewColumn('ch_acumulada', 'Ch Acumulada', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for termo_compromisso field
            //
            $column = new TextViewColumn('termo_compromisso', 'Termo Compromisso', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for apolice_seguro field
            //
            $column = new TextViewColumn('apolice_seguro', 'Apolice Seguro', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for validade_seguro field
            //
            $column = new DateTimeViewColumn('validade_seguro', 'Validade Seguro', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for cia_seguro field
            //
            $column = new TextViewColumn('cia_seguro', 'Cia Seguro', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for entrega_relatotio_final field
            //
            $column = new TextViewColumn('entrega_relatotio_final', 'Entrega Relatotio Final', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for visita field
            //
            $column = new TextViewColumn('visita', 'Visita', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for contato_supervidor field
            //
            $column = new TextViewColumn('contato_supervidor', 'Contato Supervidor', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for realizou_plano_estagio field
            //
            $column = new TextViewColumn('realizou_plano_estagio', 'Realizou Plano Estagio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for interesse_comprometimento field
            //
            $column = new TextViewColumn('interesse_comprometimento', 'Interesse Comprometimento', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for formacao field
            //
            $column = new TextViewColumn('formacao', 'Formacao', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for indica_cedente field
            //
            $column = new TextViewColumn('indica_cedente', 'Indica Cedente', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_instalacoes field
            //
            $column = new TextViewColumn('avaliacao_instalacoes', 'Avaliacao Instalacoes', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_equipamentos field
            //
            $column = new TextViewColumn('avaliacao_equipamentos', 'Avaliacao Equipamentos', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_seguranca field
            //
            $column = new TextViewColumn('avaliacao_seguranca', 'Avaliacao Seguranca', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_relacionamento field
            //
            $column = new TextViewColumn('avaliacao_relacionamento', 'Avaliacao Relacionamento', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_clima_organizacional field
            //
            $column = new TextViewColumn('avaliacao_clima_organizacional', 'Avaliacao Clima Organizacional', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_orientacao_supervisor field
            //
            $column = new TextViewColumn('avaliacao_orientacao_supervisor', 'Avaliacao Orientacao Supervisor', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_supervisao_professor field
            //
            $column = new TextViewColumn('avaliacao_supervisao_professor', 'Avaliacao Supervisao Professor', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avalicao_contribuicao_crescimento field
            //
            $column = new TextViewColumn('avalicao_contribuicao_crescimento', 'Avalicao Contribuicao Crescimento', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_aplicacao_conhecimento field
            //
            $column = new TextViewColumn('avaliacao_aplicacao_conhecimento', 'Avaliacao Aplicacao Conhecimento', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avalicao_opiniao_estagio field
            //
            $column = new TextViewColumn('avalicao_opiniao_estagio', 'Avalicao Opiniao Estagio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_participacao_estagio field
            //
            $column = new TextViewColumn('avaliacao_participacao_estagio', 'Avaliacao Participacao Estagio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_capacidade_profissional field
            //
            $column = new TextViewColumn('avaliacao_capacidade_profissional', 'Avaliacao Capacidade Profissional', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for obtencao_estagio field
            //
            $column = new TextViewColumn('obtencao_estagio', 'Obtencao Estagio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for oferece_capacitacao_profissional field
            //
            $column = new TextViewColumn('oferece_capacitacao_profissional', 'Oferece Capacitacao Profissional', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for continuar_area field
            //
            $column = new TextViewColumn('continuar_area', 'Continuar Area', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for motivo_continuar_area field
            //
            $column = new TextViewColumn('motivo_continuar_area', 'Motivo Continuar Area', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_motivo_continuar_area_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for pontos_positivo_negativos field
            //
            $column = new TextViewColumn('pontos_positivo_negativos', 'Pontos Positivo Negativos', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_pontos_positivo_negativos_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for conhecimentos_estagios field
            //
            $column = new TextViewColumn('conhecimentos_estagios', 'Conhecimentos Estagios', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_conhecimentos_estagios_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for atividades_desenvolvidas field
            //
            $column = new TextViewColumn('atividades_desenvolvidas', 'Atividades Desenvolvidas', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_atividades_desenvolvidas_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for contribuicao_tecnica field
            //
            $column = new TextViewColumn('contribuicao_tecnica', 'Contribuicao Tecnica', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_contribuicao_tecnica_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for conhecimento_x_atividades field
            //
            $column = new TextViewColumn('conhecimento_x_atividades', 'Conhecimento X Atividades', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_conhecimento_x_atividades_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for sugestoes field
            //
            $column = new TextViewColumn('sugestoes', 'Sugestoes', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_sugestoes_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for atividade_estagiario field
            //
            $column = new TextViewColumn('atividade_estagiario', 'Atividade Estagiario', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_atividade_estagiario_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for equipamentos_utilizados field
            //
            $column = new TextViewColumn('equipamentos_utilizados', 'Equipamentos Utilizados', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_equipamentos_utilizados_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for sugestao_ensino_instituicao field
            //
            $column = new TextViewColumn('sugestao_ensino_instituicao', 'Sugestao Ensino Instituicao', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_sugestao_ensino_instituicao_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for dificuldades_estagio field
            //
            $column = new TextViewColumn('dificuldades_estagio', 'Dificuldades Estagio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_dificuldades_estagio_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for pontualidade field
            //
            $column = new TextViewColumn('pontualidade', 'Pontualidade', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for assiduidade field
            //
            $column = new TextViewColumn('assiduidade', 'Assiduidade', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for motivacao field
            //
            $column = new TextViewColumn('motivacao', 'Motivacao', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for iniciativa field
            //
            $column = new TextViewColumn('iniciativa', 'Iniciativa', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for relacionamento field
            //
            $column = new TextViewColumn('relacionamento', 'Relacionamento', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for adaptabilidade field
            //
            $column = new TextViewColumn('adaptabilidade', 'Adaptabilidade', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for cooperacao field
            //
            $column = new TextViewColumn('cooperacao', 'Cooperacao', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for objetividade field
            //
            $column = new TextViewColumn('objetividade', 'Objetividade', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for produtividade field
            //
            $column = new TextViewColumn('produtividade', 'Produtividade', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for empatia field
            //
            $column = new TextViewColumn('empatia', 'Empatia', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for flexibilidade field
            //
            $column = new TextViewColumn('flexibilidade', 'Flexibilidade', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for criativade field
            //
            $column = new TextViewColumn('criativade', 'Criativade', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for equilibrio_emocional field
            //
            $column = new TextViewColumn('equilibrio_emocional', 'Equilibrio Emocional', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for conceito_final field
            //
            $column = new TextViewColumn('conceito_final', 'Conceito Final', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for parecer field
            //
            $column = new TextViewColumn('parecer', 'Parecer', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_parecer_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }

        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for nome_aluno field
            //
            $column = new TextViewColumn('matricula_nome_aluno', 'Matricula', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for nome_empresa field
            //
            $column = new TextViewColumn('cnpj_nome_empresa', 'Cnpj', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for obrigatorio field
            //
            $column = new TextViewColumn('obrigatorio', 'Obrigatorio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for nome_professor field
            //
            $column = new TextViewColumn('professor_orientador_nome_professor', 'Professor Orientador', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for nome_supervisor_estagio field
            //
            $column = new TextViewColumn('nome_supervisor_estagio', 'Nome Supervisor Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for email_supervisor_estagio field
            //
            $column = new TextViewColumn('email_supervisor_estagio', 'Email Supervisor Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for tel_supervidor_estagio field
            //
            $column = new TextViewColumn('tel_supervidor_estagio', 'Tel Supervidor Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for data_inicio field
            //
            $column = new DateTimeViewColumn('data_inicio', 'Data Inicio', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for hora_inicio field
            //
            $column = new TextViewColumn('hora_inicio', 'Hora Inicio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for data_fim field
            //
            $column = new DateTimeViewColumn('data_fim', 'Data Fim', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for hora_fim field
            //
            $column = new TextViewColumn('hora_fim', 'Hora Fim', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for ch_acumulada field
            //
            $column = new TextViewColumn('ch_acumulada', 'Ch Acumulada', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for termo_compromisso field
            //
            $column = new TextViewColumn('termo_compromisso', 'Termo Compromisso', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for apolice_seguro field
            //
            $column = new TextViewColumn('apolice_seguro', 'Apolice Seguro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for validade_seguro field
            //
            $column = new DateTimeViewColumn('validade_seguro', 'Validade Seguro', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for cia_seguro field
            //
            $column = new TextViewColumn('cia_seguro', 'Cia Seguro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for entrega_relatotio_final field
            //
            $column = new TextViewColumn('entrega_relatotio_final', 'Entrega Relatotio Final', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for visita field
            //
            $column = new TextViewColumn('visita', 'Visita', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for contato_supervidor field
            //
            $column = new TextViewColumn('contato_supervidor', 'Contato Supervidor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for realizou_plano_estagio field
            //
            $column = new TextViewColumn('realizou_plano_estagio', 'Realizou Plano Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for interesse_comprometimento field
            //
            $column = new TextViewColumn('interesse_comprometimento', 'Interesse Comprometimento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for formacao field
            //
            $column = new TextViewColumn('formacao', 'Formacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for indica_cedente field
            //
            $column = new TextViewColumn('indica_cedente', 'Indica Cedente', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_instalacoes field
            //
            $column = new TextViewColumn('avaliacao_instalacoes', 'Avaliacao Instalacoes', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_equipamentos field
            //
            $column = new TextViewColumn('avaliacao_equipamentos', 'Avaliacao Equipamentos', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_seguranca field
            //
            $column = new TextViewColumn('avaliacao_seguranca', 'Avaliacao Seguranca', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_relacionamento field
            //
            $column = new TextViewColumn('avaliacao_relacionamento', 'Avaliacao Relacionamento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_clima_organizacional field
            //
            $column = new TextViewColumn('avaliacao_clima_organizacional', 'Avaliacao Clima Organizacional', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_orientacao_supervisor field
            //
            $column = new TextViewColumn('avaliacao_orientacao_supervisor', 'Avaliacao Orientacao Supervisor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_supervisao_professor field
            //
            $column = new TextViewColumn('avaliacao_supervisao_professor', 'Avaliacao Supervisao Professor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avalicao_contribuicao_crescimento field
            //
            $column = new TextViewColumn('avalicao_contribuicao_crescimento', 'Avalicao Contribuicao Crescimento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_aplicacao_conhecimento field
            //
            $column = new TextViewColumn('avaliacao_aplicacao_conhecimento', 'Avaliacao Aplicacao Conhecimento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avalicao_opiniao_estagio field
            //
            $column = new TextViewColumn('avalicao_opiniao_estagio', 'Avalicao Opiniao Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_participacao_estagio field
            //
            $column = new TextViewColumn('avaliacao_participacao_estagio', 'Avaliacao Participacao Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_capacidade_profissional field
            //
            $column = new TextViewColumn('avaliacao_capacidade_profissional', 'Avaliacao Capacidade Profissional', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for obtencao_estagio field
            //
            $column = new TextViewColumn('obtencao_estagio', 'Obtencao Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for oferece_capacitacao_profissional field
            //
            $column = new TextViewColumn('oferece_capacitacao_profissional', 'Oferece Capacitacao Profissional', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for continuar_area field
            //
            $column = new TextViewColumn('continuar_area', 'Continuar Area', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for motivo_continuar_area field
            //
            $column = new TextViewColumn('motivo_continuar_area', 'Motivo Continuar Area', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_motivo_continuar_area_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for pontos_positivo_negativos field
            //
            $column = new TextViewColumn('pontos_positivo_negativos', 'Pontos Positivo Negativos', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_pontos_positivo_negativos_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for conhecimentos_estagios field
            //
            $column = new TextViewColumn('conhecimentos_estagios', 'Conhecimentos Estagios', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_conhecimentos_estagios_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for atividades_desenvolvidas field
            //
            $column = new TextViewColumn('atividades_desenvolvidas', 'Atividades Desenvolvidas', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_atividades_desenvolvidas_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for contribuicao_tecnica field
            //
            $column = new TextViewColumn('contribuicao_tecnica', 'Contribuicao Tecnica', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_contribuicao_tecnica_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for conhecimento_x_atividades field
            //
            $column = new TextViewColumn('conhecimento_x_atividades', 'Conhecimento X Atividades', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_conhecimento_x_atividades_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for sugestoes field
            //
            $column = new TextViewColumn('sugestoes', 'Sugestoes', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_sugestoes_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for atividade_estagiario field
            //
            $column = new TextViewColumn('atividade_estagiario', 'Atividade Estagiario', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_atividade_estagiario_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for equipamentos_utilizados field
            //
            $column = new TextViewColumn('equipamentos_utilizados', 'Equipamentos Utilizados', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_equipamentos_utilizados_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for sugestao_ensino_instituicao field
            //
            $column = new TextViewColumn('sugestao_ensino_instituicao', 'Sugestao Ensino Instituicao', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_sugestao_ensino_instituicao_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for dificuldades_estagio field
            //
            $column = new TextViewColumn('dificuldades_estagio', 'Dificuldades Estagio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_dificuldades_estagio_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for pontualidade field
            //
            $column = new TextViewColumn('pontualidade', 'Pontualidade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for assiduidade field
            //
            $column = new TextViewColumn('assiduidade', 'Assiduidade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for motivacao field
            //
            $column = new TextViewColumn('motivacao', 'Motivacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for iniciativa field
            //
            $column = new TextViewColumn('iniciativa', 'Iniciativa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for relacionamento field
            //
            $column = new TextViewColumn('relacionamento', 'Relacionamento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for adaptabilidade field
            //
            $column = new TextViewColumn('adaptabilidade', 'Adaptabilidade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for cooperacao field
            //
            $column = new TextViewColumn('cooperacao', 'Cooperacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for objetividade field
            //
            $column = new TextViewColumn('objetividade', 'Objetividade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for produtividade field
            //
            $column = new TextViewColumn('produtividade', 'Produtividade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for empatia field
            //
            $column = new TextViewColumn('empatia', 'Empatia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for flexibilidade field
            //
            $column = new TextViewColumn('flexibilidade', 'Flexibilidade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for criativade field
            //
            $column = new TextViewColumn('criativade', 'Criativade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for equilibrio_emocional field
            //
            $column = new TextViewColumn('equilibrio_emocional', 'Equilibrio Emocional', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for conceito_final field
            //
            $column = new TextViewColumn('conceito_final', 'Conceito Final', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for parecer field
            //
            $column = new TextViewColumn('parecer', 'Parecer', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('estagioGrid_parecer_handler_view');
            $grid->AddSingleRecordViewColumn($column);
        }

        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for matricula field
            //
            $editor = new ComboBox('matricula_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`aluno`');
            $field = new StringField('matricula');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('nome_aluno');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cod_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('periodo');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('ano_conclusao');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('rua');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('bairro');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cidade');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('uf');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cep');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('email');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('celular');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('fixo');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('nome_aluno', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Matricula',
                'matricula',
                $editor,
                $this->dataset, 'matricula', 'nome_aluno', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for cnpj field
            //
            $editor = new ComboBox('cnpj_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`empresa`');
            $field = new StringField('cnpj');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('nome_empresa');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('rua');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('bairro');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cidade');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('uf');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cep');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('contato');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('telefone');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('convenio');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('representante_legal');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cargo_representante');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('celular');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('emaiil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('registro_profissional');
            $lookupDataset->AddField($field, false);
            $field = new StringField('licenca_municipal');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('nome_empresa', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Cnpj',
                'cnpj',
                $editor,
                $this->dataset, 'cnpj', 'nome_empresa', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for obrigatorio field
            //
            $editor = new TextEdit('obrigatorio_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Obrigatorio', 'obrigatorio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for professor_orientador field
            //
            $editor = new ComboBox('professor_orientador_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`professor`');
            $field = new StringField('siape');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('nome_professor');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cod_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $lookupDataset->setOrderByField('nome_professor', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Professor Orientador',
                'professor_orientador',
                $editor,
                $this->dataset, 'siape', 'nome_professor', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for nome_supervisor_estagio field
            //
            $editor = new TextEdit('nome_supervisor_estagio_edit');
            $editor->SetSize(40);
            $editor->SetMaxLength(40);
            $editColumn = new CustomEditColumn('Nome Supervisor Estagio', 'nome_supervisor_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for email_supervisor_estagio field
            //
            $editor = new TextEdit('email_supervisor_estagio_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Email Supervisor Estagio', 'email_supervisor_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for tel_supervidor_estagio field
            //
            $editor = new TextEdit('tel_supervidor_estagio_edit');
            $editor->SetSize(10);
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('Tel Supervidor Estagio', 'tel_supervidor_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for data_inicio field
            //
            $editor = new DateTimeEdit('data_inicio_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Data Inicio', 'data_inicio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for hora_inicio field
            //
            $editor = new TextEdit('hora_inicio_edit');
            $editor->SetSize(5);
            $editor->SetMaxLength(5);
            $editColumn = new CustomEditColumn('Hora Inicio', 'hora_inicio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for data_fim field
            //
            $editor = new DateTimeEdit('data_fim_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Data Fim', 'data_fim', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for hora_fim field
            //
            $editor = new TextEdit('hora_fim_edit');
            $editor->SetSize(5);
            $editor->SetMaxLength(5);
            $editColumn = new CustomEditColumn('Hora Fim', 'hora_fim', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for ch_acumulada field
            //
            $editor = new TextEdit('ch_acumulada_edit');
            $editColumn = new CustomEditColumn('Ch Acumulada', 'ch_acumulada', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for termo_compromisso field
            //
            $editor = new TextEdit('termo_compromisso_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Termo Compromisso', 'termo_compromisso', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for apolice_seguro field
            //
            $editor = new TextEdit('apolice_seguro_edit');
            $editor->SetSize(15);
            $editor->SetMaxLength(15);
            $editColumn = new CustomEditColumn('Apolice Seguro', 'apolice_seguro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for validade_seguro field
            //
            $editor = new DateTimeEdit('validade_seguro_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Validade Seguro', 'validade_seguro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for cia_seguro field
            //
            $editor = new TextEdit('cia_seguro_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Cia Seguro', 'cia_seguro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for entrega_relatotio_final field
            //
            $editor = new TextEdit('entrega_relatotio_final_edit');
            $editor->SetSize(10);
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('Entrega Relatotio Final', 'entrega_relatotio_final', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for visita field
            //
            $editor = new TextEdit('visita_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Visita', 'visita', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for contato_supervidor field
            //
            $editor = new TextEdit('contato_supervidor_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Contato Supervidor', 'contato_supervidor', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for realizou_plano_estagio field
            //
            $editor = new TextEdit('realizou_plano_estagio_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Realizou Plano Estagio', 'realizou_plano_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for interesse_comprometimento field
            //
            $editor = new TextEdit('interesse_comprometimento_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Interesse Comprometimento', 'interesse_comprometimento', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for formacao field
            //
            $editor = new TextEdit('formacao_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Formacao', 'formacao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for indica_cedente field
            //
            $editor = new TextEdit('indica_cedente_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Indica Cedente', 'indica_cedente', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_instalacoes field
            //
            $editor = new TextEdit('avaliacao_instalacoes_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Instalacoes', 'avaliacao_instalacoes', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_equipamentos field
            //
            $editor = new TextEdit('avaliacao_equipamentos_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Equipamentos', 'avaliacao_equipamentos', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_seguranca field
            //
            $editor = new TextEdit('avaliacao_seguranca_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Seguranca', 'avaliacao_seguranca', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_relacionamento field
            //
            $editor = new TextEdit('avaliacao_relacionamento_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Relacionamento', 'avaliacao_relacionamento', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_clima_organizacional field
            //
            $editor = new TextEdit('avaliacao_clima_organizacional_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Clima Organizacional', 'avaliacao_clima_organizacional', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_orientacao_supervisor field
            //
            $editor = new TextEdit('avaliacao_orientacao_supervisor_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Orientacao Supervisor', 'avaliacao_orientacao_supervisor', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_supervisao_professor field
            //
            $editor = new TextEdit('avaliacao_supervisao_professor_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Supervisao Professor', 'avaliacao_supervisao_professor', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avalicao_contribuicao_crescimento field
            //
            $editor = new TextEdit('avalicao_contribuicao_crescimento_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avalicao Contribuicao Crescimento', 'avalicao_contribuicao_crescimento', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_aplicacao_conhecimento field
            //
            $editor = new TextEdit('avaliacao_aplicacao_conhecimento_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Aplicacao Conhecimento', 'avaliacao_aplicacao_conhecimento', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avalicao_opiniao_estagio field
            //
            $editor = new TextEdit('avalicao_opiniao_estagio_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avalicao Opiniao Estagio', 'avalicao_opiniao_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_participacao_estagio field
            //
            $editor = new TextEdit('avaliacao_participacao_estagio_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Participacao Estagio', 'avaliacao_participacao_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_capacidade_profissional field
            //
            $editor = new TextEdit('avaliacao_capacidade_profissional_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Capacidade Profissional', 'avaliacao_capacidade_profissional', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for obtencao_estagio field
            //
            $editor = new TextEdit('obtencao_estagio_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Obtencao Estagio', 'obtencao_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for oferece_capacitacao_profissional field
            //
            $editor = new TextEdit('oferece_capacitacao_profissional_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Oferece Capacitacao Profissional', 'oferece_capacitacao_profissional', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for continuar_area field
            //
            $editor = new TextEdit('continuar_area_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Continuar Area', 'continuar_area', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for motivo_continuar_area field
            //
            $editor = new TextEdit('motivo_continuar_area_edit');
            $editor->SetSize(100);
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Motivo Continuar Area', 'motivo_continuar_area', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for pontos_positivo_negativos field
            //
            $editor = new TextAreaEdit('pontos_positivo_negativos_edit', 50, 8);
            $editColumn = new CustomEditColumn('Pontos Positivo Negativos', 'pontos_positivo_negativos', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for conhecimentos_estagios field
            //
            $editor = new TextAreaEdit('conhecimentos_estagios_edit', 50, 8);
            $editColumn = new CustomEditColumn('Conhecimentos Estagios', 'conhecimentos_estagios', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for atividades_desenvolvidas field
            //
            $editor = new TextAreaEdit('atividades_desenvolvidas_edit', 50, 8);
            $editColumn = new CustomEditColumn('Atividades Desenvolvidas', 'atividades_desenvolvidas', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for contribuicao_tecnica field
            //
            $editor = new TextAreaEdit('contribuicao_tecnica_edit', 50, 8);
            $editColumn = new CustomEditColumn('Contribuicao Tecnica', 'contribuicao_tecnica', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for conhecimento_x_atividades field
            //
            $editor = new TextAreaEdit('conhecimento_x_atividades_edit', 50, 8);
            $editColumn = new CustomEditColumn('Conhecimento X Atividades', 'conhecimento_x_atividades', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for sugestoes field
            //
            $editor = new TextAreaEdit('sugestoes_edit', 50, 8);
            $editColumn = new CustomEditColumn('Sugestoes', 'sugestoes', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for atividade_estagiario field
            //
            $editor = new TextAreaEdit('atividade_estagiario_edit', 50, 8);
            $editColumn = new CustomEditColumn('Atividade Estagiario', 'atividade_estagiario', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for equipamentos_utilizados field
            //
            $editor = new TextAreaEdit('equipamentos_utilizados_edit', 50, 8);
            $editColumn = new CustomEditColumn('Equipamentos Utilizados', 'equipamentos_utilizados', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for sugestao_ensino_instituicao field
            //
            $editor = new TextAreaEdit('sugestao_ensino_instituicao_edit', 50, 8);
            $editColumn = new CustomEditColumn('Sugestao Ensino Instituicao', 'sugestao_ensino_instituicao', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for dificuldades_estagio field
            //
            $editor = new TextAreaEdit('dificuldades_estagio_edit', 50, 8);
            $editColumn = new CustomEditColumn('Dificuldades Estagio', 'dificuldades_estagio', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for pontualidade field
            //
            $editor = new TextEdit('pontualidade_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Pontualidade', 'pontualidade', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for assiduidade field
            //
            $editor = new TextEdit('assiduidade_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Assiduidade', 'assiduidade', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for motivacao field
            //
            $editor = new TextEdit('motivacao_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Motivacao', 'motivacao', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for iniciativa field
            //
            $editor = new TextEdit('iniciativa_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Iniciativa', 'iniciativa', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for relacionamento field
            //
            $editor = new TextEdit('relacionamento_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Relacionamento', 'relacionamento', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for adaptabilidade field
            //
            $editor = new TextEdit('adaptabilidade_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Adaptabilidade', 'adaptabilidade', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for cooperacao field
            //
            $editor = new TextEdit('cooperacao_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Cooperacao', 'cooperacao', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for objetividade field
            //
            $editor = new TextEdit('objetividade_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Objetividade', 'objetividade', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for produtividade field
            //
            $editor = new TextEdit('produtividade_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Produtividade', 'produtividade', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for empatia field
            //
            $editor = new TextEdit('empatia_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Empatia', 'empatia', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for flexibilidade field
            //
            $editor = new TextEdit('flexibilidade_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Flexibilidade', 'flexibilidade', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for criativade field
            //
            $editor = new TextEdit('criativade_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Criativade', 'criativade', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for equilibrio_emocional field
            //
            $editor = new TextEdit('equilibrio_emocional_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Equilibrio Emocional', 'equilibrio_emocional', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for conceito_final field
            //
            $editor = new TextEdit('conceito_final_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Conceito Final', 'conceito_final', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for parecer field
            //
            $editor = new TextAreaEdit('parecer_edit', 50, 8);
            $editColumn = new CustomEditColumn('Parecer', 'parecer', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }

        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for matricula field
            //
            $editor = new ComboBox('matricula_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`aluno`');
            $field = new StringField('matricula');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('nome_aluno');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cod_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('periodo');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('ano_conclusao');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('rua');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('bairro');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cidade');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('uf');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cep');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('email');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('celular');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('fixo');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('nome_aluno', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Matricula',
                'matricula',
                $editor,
                $this->dataset, 'matricula', 'nome_aluno', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for cnpj field
            //
            $editor = new ComboBox('cnpj_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`empresa`');
            $field = new StringField('cnpj');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('nome_empresa');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('rua');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('bairro');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cidade');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('uf');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cep');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('contato');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('telefone');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('convenio');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('representante_legal');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cargo_representante');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('celular');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('emaiil');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('registro_profissional');
            $lookupDataset->AddField($field, false);
            $field = new StringField('licenca_municipal');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('nome_empresa', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Cnpj',
                'cnpj',
                $editor,
                $this->dataset, 'cnpj', 'nome_empresa', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for obrigatorio field
            //
            $editor = new TextEdit('obrigatorio_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Obrigatorio', 'obrigatorio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for professor_orientador field
            //
            $editor = new ComboBox('professor_orientador_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`professor`');
            $field = new StringField('siape');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('nome_professor');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('cod_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $lookupDataset->setOrderByField('nome_professor', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Professor Orientador',
                'professor_orientador',
                $editor,
                $this->dataset, 'siape', 'nome_professor', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for nome_supervisor_estagio field
            //
            $editor = new TextEdit('nome_supervisor_estagio_edit');
            $editor->SetSize(40);
            $editor->SetMaxLength(40);
            $editColumn = new CustomEditColumn('Nome Supervisor Estagio', 'nome_supervisor_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for email_supervisor_estagio field
            //
            $editor = new TextEdit('email_supervisor_estagio_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Email Supervisor Estagio', 'email_supervisor_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for tel_supervidor_estagio field
            //
            $editor = new TextEdit('tel_supervidor_estagio_edit');
            $editor->SetSize(10);
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('Tel Supervidor Estagio', 'tel_supervidor_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for data_inicio field
            //
            $editor = new DateTimeEdit('data_inicio_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Data Inicio', 'data_inicio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for hora_inicio field
            //
            $editor = new TextEdit('hora_inicio_edit');
            $editor->SetSize(5);
            $editor->SetMaxLength(5);
            $editColumn = new CustomEditColumn('Hora Inicio', 'hora_inicio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for data_fim field
            //
            $editor = new DateTimeEdit('data_fim_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Data Fim', 'data_fim', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for hora_fim field
            //
            $editor = new TextEdit('hora_fim_edit');
            $editor->SetSize(5);
            $editor->SetMaxLength(5);
            $editColumn = new CustomEditColumn('Hora Fim', 'hora_fim', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for ch_acumulada field
            //
            $editor = new TextEdit('ch_acumulada_edit');
            $editColumn = new CustomEditColumn('Ch Acumulada', 'ch_acumulada', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for termo_compromisso field
            //
            $editor = new TextEdit('termo_compromisso_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Termo Compromisso', 'termo_compromisso', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for apolice_seguro field
            //
            $editor = new TextEdit('apolice_seguro_edit');
            $editor->SetSize(15);
            $editor->SetMaxLength(15);
            $editColumn = new CustomEditColumn('Apolice Seguro', 'apolice_seguro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for validade_seguro field
            //
            $editor = new DateTimeEdit('validade_seguro_edit', false, 'Y-m-d H:i:s', GetFirstDayOfWeek());
            $editColumn = new CustomEditColumn('Validade Seguro', 'validade_seguro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for cia_seguro field
            //
            $editor = new TextEdit('cia_seguro_edit');
            $editor->SetSize(30);
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Cia Seguro', 'cia_seguro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for entrega_relatotio_final field
            //
            $editor = new TextEdit('entrega_relatotio_final_edit');
            $editor->SetSize(10);
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('Entrega Relatotio Final', 'entrega_relatotio_final', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for visita field
            //
            $editor = new TextEdit('visita_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Visita', 'visita', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for contato_supervidor field
            //
            $editor = new TextEdit('contato_supervidor_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Contato Supervidor', 'contato_supervidor', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for realizou_plano_estagio field
            //
            $editor = new TextEdit('realizou_plano_estagio_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Realizou Plano Estagio', 'realizou_plano_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for interesse_comprometimento field
            //
            $editor = new TextEdit('interesse_comprometimento_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Interesse Comprometimento', 'interesse_comprometimento', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for formacao field
            //
            $editor = new TextEdit('formacao_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Formacao', 'formacao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for indica_cedente field
            //
            $editor = new TextEdit('indica_cedente_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Indica Cedente', 'indica_cedente', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_instalacoes field
            //
            $editor = new TextEdit('avaliacao_instalacoes_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Instalacoes', 'avaliacao_instalacoes', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_equipamentos field
            //
            $editor = new TextEdit('avaliacao_equipamentos_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Equipamentos', 'avaliacao_equipamentos', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_seguranca field
            //
            $editor = new TextEdit('avaliacao_seguranca_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Seguranca', 'avaliacao_seguranca', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_relacionamento field
            //
            $editor = new TextEdit('avaliacao_relacionamento_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Relacionamento', 'avaliacao_relacionamento', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_clima_organizacional field
            //
            $editor = new TextEdit('avaliacao_clima_organizacional_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Clima Organizacional', 'avaliacao_clima_organizacional', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_orientacao_supervisor field
            //
            $editor = new TextEdit('avaliacao_orientacao_supervisor_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Orientacao Supervisor', 'avaliacao_orientacao_supervisor', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_supervisao_professor field
            //
            $editor = new TextEdit('avaliacao_supervisao_professor_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Supervisao Professor', 'avaliacao_supervisao_professor', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avalicao_contribuicao_crescimento field
            //
            $editor = new TextEdit('avalicao_contribuicao_crescimento_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avalicao Contribuicao Crescimento', 'avalicao_contribuicao_crescimento', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_aplicacao_conhecimento field
            //
            $editor = new TextEdit('avaliacao_aplicacao_conhecimento_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Aplicacao Conhecimento', 'avaliacao_aplicacao_conhecimento', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avalicao_opiniao_estagio field
            //
            $editor = new TextEdit('avalicao_opiniao_estagio_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avalicao Opiniao Estagio', 'avalicao_opiniao_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_participacao_estagio field
            //
            $editor = new TextEdit('avaliacao_participacao_estagio_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Participacao Estagio', 'avaliacao_participacao_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_capacidade_profissional field
            //
            $editor = new TextEdit('avaliacao_capacidade_profissional_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Capacidade Profissional', 'avaliacao_capacidade_profissional', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for obtencao_estagio field
            //
            $editor = new TextEdit('obtencao_estagio_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Obtencao Estagio', 'obtencao_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for oferece_capacitacao_profissional field
            //
            $editor = new TextEdit('oferece_capacitacao_profissional_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Oferece Capacitacao Profissional', 'oferece_capacitacao_profissional', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for continuar_area field
            //
            $editor = new TextEdit('continuar_area_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Continuar Area', 'continuar_area', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for motivo_continuar_area field
            //
            $editor = new TextEdit('motivo_continuar_area_edit');
            $editor->SetSize(100);
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Motivo Continuar Area', 'motivo_continuar_area', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for pontos_positivo_negativos field
            //
            $editor = new TextAreaEdit('pontos_positivo_negativos_edit', 50, 8);
            $editColumn = new CustomEditColumn('Pontos Positivo Negativos', 'pontos_positivo_negativos', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for conhecimentos_estagios field
            //
            $editor = new TextAreaEdit('conhecimentos_estagios_edit', 50, 8);
            $editColumn = new CustomEditColumn('Conhecimentos Estagios', 'conhecimentos_estagios', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for atividades_desenvolvidas field
            //
            $editor = new TextAreaEdit('atividades_desenvolvidas_edit', 50, 8);
            $editColumn = new CustomEditColumn('Atividades Desenvolvidas', 'atividades_desenvolvidas', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for contribuicao_tecnica field
            //
            $editor = new TextAreaEdit('contribuicao_tecnica_edit', 50, 8);
            $editColumn = new CustomEditColumn('Contribuicao Tecnica', 'contribuicao_tecnica', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for conhecimento_x_atividades field
            //
            $editor = new TextAreaEdit('conhecimento_x_atividades_edit', 50, 8);
            $editColumn = new CustomEditColumn('Conhecimento X Atividades', 'conhecimento_x_atividades', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for sugestoes field
            //
            $editor = new TextAreaEdit('sugestoes_edit', 50, 8);
            $editColumn = new CustomEditColumn('Sugestoes', 'sugestoes', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for atividade_estagiario field
            //
            $editor = new TextAreaEdit('atividade_estagiario_edit', 50, 8);
            $editColumn = new CustomEditColumn('Atividade Estagiario', 'atividade_estagiario', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for equipamentos_utilizados field
            //
            $editor = new TextAreaEdit('equipamentos_utilizados_edit', 50, 8);
            $editColumn = new CustomEditColumn('Equipamentos Utilizados', 'equipamentos_utilizados', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for sugestao_ensino_instituicao field
            //
            $editor = new TextAreaEdit('sugestao_ensino_instituicao_edit', 50, 8);
            $editColumn = new CustomEditColumn('Sugestao Ensino Instituicao', 'sugestao_ensino_instituicao', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for dificuldades_estagio field
            //
            $editor = new TextAreaEdit('dificuldades_estagio_edit', 50, 8);
            $editColumn = new CustomEditColumn('Dificuldades Estagio', 'dificuldades_estagio', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for pontualidade field
            //
            $editor = new TextEdit('pontualidade_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Pontualidade', 'pontualidade', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for assiduidade field
            //
            $editor = new TextEdit('assiduidade_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Assiduidade', 'assiduidade', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for motivacao field
            //
            $editor = new TextEdit('motivacao_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Motivacao', 'motivacao', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for iniciativa field
            //
            $editor = new TextEdit('iniciativa_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Iniciativa', 'iniciativa', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for relacionamento field
            //
            $editor = new TextEdit('relacionamento_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Relacionamento', 'relacionamento', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for adaptabilidade field
            //
            $editor = new TextEdit('adaptabilidade_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Adaptabilidade', 'adaptabilidade', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for cooperacao field
            //
            $editor = new TextEdit('cooperacao_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Cooperacao', 'cooperacao', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for objetividade field
            //
            $editor = new TextEdit('objetividade_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Objetividade', 'objetividade', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for produtividade field
            //
            $editor = new TextEdit('produtividade_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Produtividade', 'produtividade', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for empatia field
            //
            $editor = new TextEdit('empatia_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Empatia', 'empatia', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for flexibilidade field
            //
            $editor = new TextEdit('flexibilidade_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Flexibilidade', 'flexibilidade', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for criativade field
            //
            $editor = new TextEdit('criativade_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Criativade', 'criativade', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for equilibrio_emocional field
            //
            $editor = new TextEdit('equilibrio_emocional_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Equilibrio Emocional', 'equilibrio_emocional', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for conceito_final field
            //
            $editor = new TextEdit('conceito_final_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Conceito Final', 'conceito_final', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for parecer field
            //
            $editor = new TextAreaEdit('parecer_edit', 50, 8);
            $editColumn = new CustomEditColumn('Parecer', 'parecer', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $grid->SetShowAddButton(true);
                $grid->SetShowInlineAddButton(false);
            }
            else
            {
                $grid->SetShowInlineAddButton(false);
                $grid->SetShowAddButton(false);
            }
        }

        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for nome_aluno field
            //
            $column = new TextViewColumn('matricula_nome_aluno', 'Matricula', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for nome_empresa field
            //
            $column = new TextViewColumn('cnpj_nome_empresa', 'Cnpj', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for obrigatorio field
            //
            $column = new TextViewColumn('obrigatorio', 'Obrigatorio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for nome_professor field
            //
            $column = new TextViewColumn('professor_orientador_nome_professor', 'Professor Orientador', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for nome_supervisor_estagio field
            //
            $column = new TextViewColumn('nome_supervisor_estagio', 'Nome Supervisor Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for email_supervisor_estagio field
            //
            $column = new TextViewColumn('email_supervisor_estagio', 'Email Supervisor Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for tel_supervidor_estagio field
            //
            $column = new TextViewColumn('tel_supervidor_estagio', 'Tel Supervidor Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for data_inicio field
            //
            $column = new DateTimeViewColumn('data_inicio', 'Data Inicio', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for hora_inicio field
            //
            $column = new TextViewColumn('hora_inicio', 'Hora Inicio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for data_fim field
            //
            $column = new DateTimeViewColumn('data_fim', 'Data Fim', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for hora_fim field
            //
            $column = new TextViewColumn('hora_fim', 'Hora Fim', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for ch_acumulada field
            //
            $column = new TextViewColumn('ch_acumulada', 'Ch Acumulada', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for termo_compromisso field
            //
            $column = new TextViewColumn('termo_compromisso', 'Termo Compromisso', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for apolice_seguro field
            //
            $column = new TextViewColumn('apolice_seguro', 'Apolice Seguro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for validade_seguro field
            //
            $column = new DateTimeViewColumn('validade_seguro', 'Validade Seguro', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for cia_seguro field
            //
            $column = new TextViewColumn('cia_seguro', 'Cia Seguro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for entrega_relatotio_final field
            //
            $column = new TextViewColumn('entrega_relatotio_final', 'Entrega Relatotio Final', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for visita field
            //
            $column = new TextViewColumn('visita', 'Visita', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for contato_supervidor field
            //
            $column = new TextViewColumn('contato_supervidor', 'Contato Supervidor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for realizou_plano_estagio field
            //
            $column = new TextViewColumn('realizou_plano_estagio', 'Realizou Plano Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for interesse_comprometimento field
            //
            $column = new TextViewColumn('interesse_comprometimento', 'Interesse Comprometimento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for formacao field
            //
            $column = new TextViewColumn('formacao', 'Formacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for indica_cedente field
            //
            $column = new TextViewColumn('indica_cedente', 'Indica Cedente', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_instalacoes field
            //
            $column = new TextViewColumn('avaliacao_instalacoes', 'Avaliacao Instalacoes', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_equipamentos field
            //
            $column = new TextViewColumn('avaliacao_equipamentos', 'Avaliacao Equipamentos', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_seguranca field
            //
            $column = new TextViewColumn('avaliacao_seguranca', 'Avaliacao Seguranca', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_relacionamento field
            //
            $column = new TextViewColumn('avaliacao_relacionamento', 'Avaliacao Relacionamento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_clima_organizacional field
            //
            $column = new TextViewColumn('avaliacao_clima_organizacional', 'Avaliacao Clima Organizacional', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_orientacao_supervisor field
            //
            $column = new TextViewColumn('avaliacao_orientacao_supervisor', 'Avaliacao Orientacao Supervisor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_supervisao_professor field
            //
            $column = new TextViewColumn('avaliacao_supervisao_professor', 'Avaliacao Supervisao Professor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avalicao_contribuicao_crescimento field
            //
            $column = new TextViewColumn('avalicao_contribuicao_crescimento', 'Avalicao Contribuicao Crescimento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_aplicacao_conhecimento field
            //
            $column = new TextViewColumn('avaliacao_aplicacao_conhecimento', 'Avaliacao Aplicacao Conhecimento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avalicao_opiniao_estagio field
            //
            $column = new TextViewColumn('avalicao_opiniao_estagio', 'Avalicao Opiniao Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_participacao_estagio field
            //
            $column = new TextViewColumn('avaliacao_participacao_estagio', 'Avaliacao Participacao Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_capacidade_profissional field
            //
            $column = new TextViewColumn('avaliacao_capacidade_profissional', 'Avaliacao Capacidade Profissional', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for obtencao_estagio field
            //
            $column = new TextViewColumn('obtencao_estagio', 'Obtencao Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for oferece_capacitacao_profissional field
            //
            $column = new TextViewColumn('oferece_capacitacao_profissional', 'Oferece Capacitacao Profissional', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for continuar_area field
            //
            $column = new TextViewColumn('continuar_area', 'Continuar Area', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for motivo_continuar_area field
            //
            $column = new TextViewColumn('motivo_continuar_area', 'Motivo Continuar Area', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for pontos_positivo_negativos field
            //
            $column = new TextViewColumn('pontos_positivo_negativos', 'Pontos Positivo Negativos', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for conhecimentos_estagios field
            //
            $column = new TextViewColumn('conhecimentos_estagios', 'Conhecimentos Estagios', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for atividades_desenvolvidas field
            //
            $column = new TextViewColumn('atividades_desenvolvidas', 'Atividades Desenvolvidas', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for contribuicao_tecnica field
            //
            $column = new TextViewColumn('contribuicao_tecnica', 'Contribuicao Tecnica', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for conhecimento_x_atividades field
            //
            $column = new TextViewColumn('conhecimento_x_atividades', 'Conhecimento X Atividades', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for sugestoes field
            //
            $column = new TextViewColumn('sugestoes', 'Sugestoes', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for atividade_estagiario field
            //
            $column = new TextViewColumn('atividade_estagiario', 'Atividade Estagiario', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for equipamentos_utilizados field
            //
            $column = new TextViewColumn('equipamentos_utilizados', 'Equipamentos Utilizados', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for sugestao_ensino_instituicao field
            //
            $column = new TextViewColumn('sugestao_ensino_instituicao', 'Sugestao Ensino Instituicao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for dificuldades_estagio field
            //
            $column = new TextViewColumn('dificuldades_estagio', 'Dificuldades Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for pontualidade field
            //
            $column = new TextViewColumn('pontualidade', 'Pontualidade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for assiduidade field
            //
            $column = new TextViewColumn('assiduidade', 'Assiduidade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for motivacao field
            //
            $column = new TextViewColumn('motivacao', 'Motivacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for iniciativa field
            //
            $column = new TextViewColumn('iniciativa', 'Iniciativa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for relacionamento field
            //
            $column = new TextViewColumn('relacionamento', 'Relacionamento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for adaptabilidade field
            //
            $column = new TextViewColumn('adaptabilidade', 'Adaptabilidade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for cooperacao field
            //
            $column = new TextViewColumn('cooperacao', 'Cooperacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for objetividade field
            //
            $column = new TextViewColumn('objetividade', 'Objetividade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for produtividade field
            //
            $column = new TextViewColumn('produtividade', 'Produtividade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for empatia field
            //
            $column = new TextViewColumn('empatia', 'Empatia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for flexibilidade field
            //
            $column = new TextViewColumn('flexibilidade', 'Flexibilidade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for criativade field
            //
            $column = new TextViewColumn('criativade', 'Criativade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for equilibrio_emocional field
            //
            $column = new TextViewColumn('equilibrio_emocional', 'Equilibrio Emocional', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for conceito_final field
            //
            $column = new TextViewColumn('conceito_final', 'Conceito Final', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for parecer field
            //
            $column = new TextViewColumn('parecer', 'Parecer', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }

        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for nome_aluno field
            //
            $column = new TextViewColumn('matricula_nome_aluno', 'Matricula', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for nome_empresa field
            //
            $column = new TextViewColumn('cnpj_nome_empresa', 'Cnpj', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for obrigatorio field
            //
            $column = new TextViewColumn('obrigatorio', 'Obrigatorio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for nome_professor field
            //
            $column = new TextViewColumn('professor_orientador_nome_professor', 'Professor Orientador', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for nome_supervisor_estagio field
            //
            $column = new TextViewColumn('nome_supervisor_estagio', 'Nome Supervisor Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for email_supervisor_estagio field
            //
            $column = new TextViewColumn('email_supervisor_estagio', 'Email Supervisor Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for tel_supervidor_estagio field
            //
            $column = new TextViewColumn('tel_supervidor_estagio', 'Tel Supervidor Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for data_inicio field
            //
            $column = new DateTimeViewColumn('data_inicio', 'Data Inicio', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for hora_inicio field
            //
            $column = new TextViewColumn('hora_inicio', 'Hora Inicio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for data_fim field
            //
            $column = new DateTimeViewColumn('data_fim', 'Data Fim', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for hora_fim field
            //
            $column = new TextViewColumn('hora_fim', 'Hora Fim', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for ch_acumulada field
            //
            $column = new TextViewColumn('ch_acumulada', 'Ch Acumulada', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for termo_compromisso field
            //
            $column = new TextViewColumn('termo_compromisso', 'Termo Compromisso', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for apolice_seguro field
            //
            $column = new TextViewColumn('apolice_seguro', 'Apolice Seguro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for validade_seguro field
            //
            $column = new DateTimeViewColumn('validade_seguro', 'Validade Seguro', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for cia_seguro field
            //
            $column = new TextViewColumn('cia_seguro', 'Cia Seguro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for entrega_relatotio_final field
            //
            $column = new TextViewColumn('entrega_relatotio_final', 'Entrega Relatotio Final', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for visita field
            //
            $column = new TextViewColumn('visita', 'Visita', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for contato_supervidor field
            //
            $column = new TextViewColumn('contato_supervidor', 'Contato Supervidor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for realizou_plano_estagio field
            //
            $column = new TextViewColumn('realizou_plano_estagio', 'Realizou Plano Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for interesse_comprometimento field
            //
            $column = new TextViewColumn('interesse_comprometimento', 'Interesse Comprometimento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for formacao field
            //
            $column = new TextViewColumn('formacao', 'Formacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for indica_cedente field
            //
            $column = new TextViewColumn('indica_cedente', 'Indica Cedente', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_instalacoes field
            //
            $column = new TextViewColumn('avaliacao_instalacoes', 'Avaliacao Instalacoes', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_equipamentos field
            //
            $column = new TextViewColumn('avaliacao_equipamentos', 'Avaliacao Equipamentos', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_seguranca field
            //
            $column = new TextViewColumn('avaliacao_seguranca', 'Avaliacao Seguranca', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_relacionamento field
            //
            $column = new TextViewColumn('avaliacao_relacionamento', 'Avaliacao Relacionamento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_clima_organizacional field
            //
            $column = new TextViewColumn('avaliacao_clima_organizacional', 'Avaliacao Clima Organizacional', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_orientacao_supervisor field
            //
            $column = new TextViewColumn('avaliacao_orientacao_supervisor', 'Avaliacao Orientacao Supervisor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_supervisao_professor field
            //
            $column = new TextViewColumn('avaliacao_supervisao_professor', 'Avaliacao Supervisao Professor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avalicao_contribuicao_crescimento field
            //
            $column = new TextViewColumn('avalicao_contribuicao_crescimento', 'Avalicao Contribuicao Crescimento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_aplicacao_conhecimento field
            //
            $column = new TextViewColumn('avaliacao_aplicacao_conhecimento', 'Avaliacao Aplicacao Conhecimento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avalicao_opiniao_estagio field
            //
            $column = new TextViewColumn('avalicao_opiniao_estagio', 'Avalicao Opiniao Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_participacao_estagio field
            //
            $column = new TextViewColumn('avaliacao_participacao_estagio', 'Avaliacao Participacao Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_capacidade_profissional field
            //
            $column = new TextViewColumn('avaliacao_capacidade_profissional', 'Avaliacao Capacidade Profissional', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for obtencao_estagio field
            //
            $column = new TextViewColumn('obtencao_estagio', 'Obtencao Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for oferece_capacitacao_profissional field
            //
            $column = new TextViewColumn('oferece_capacitacao_profissional', 'Oferece Capacitacao Profissional', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for continuar_area field
            //
            $column = new TextViewColumn('continuar_area', 'Continuar Area', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for motivo_continuar_area field
            //
            $column = new TextViewColumn('motivo_continuar_area', 'Motivo Continuar Area', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for pontos_positivo_negativos field
            //
            $column = new TextViewColumn('pontos_positivo_negativos', 'Pontos Positivo Negativos', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for conhecimentos_estagios field
            //
            $column = new TextViewColumn('conhecimentos_estagios', 'Conhecimentos Estagios', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for atividades_desenvolvidas field
            //
            $column = new TextViewColumn('atividades_desenvolvidas', 'Atividades Desenvolvidas', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for contribuicao_tecnica field
            //
            $column = new TextViewColumn('contribuicao_tecnica', 'Contribuicao Tecnica', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for conhecimento_x_atividades field
            //
            $column = new TextViewColumn('conhecimento_x_atividades', 'Conhecimento X Atividades', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for sugestoes field
            //
            $column = new TextViewColumn('sugestoes', 'Sugestoes', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for atividade_estagiario field
            //
            $column = new TextViewColumn('atividade_estagiario', 'Atividade Estagiario', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for equipamentos_utilizados field
            //
            $column = new TextViewColumn('equipamentos_utilizados', 'Equipamentos Utilizados', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for sugestao_ensino_instituicao field
            //
            $column = new TextViewColumn('sugestao_ensino_instituicao', 'Sugestao Ensino Instituicao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for dificuldades_estagio field
            //
            $column = new TextViewColumn('dificuldades_estagio', 'Dificuldades Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for pontualidade field
            //
            $column = new TextViewColumn('pontualidade', 'Pontualidade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for assiduidade field
            //
            $column = new TextViewColumn('assiduidade', 'Assiduidade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for motivacao field
            //
            $column = new TextViewColumn('motivacao', 'Motivacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for iniciativa field
            //
            $column = new TextViewColumn('iniciativa', 'Iniciativa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for relacionamento field
            //
            $column = new TextViewColumn('relacionamento', 'Relacionamento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for adaptabilidade field
            //
            $column = new TextViewColumn('adaptabilidade', 'Adaptabilidade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for cooperacao field
            //
            $column = new TextViewColumn('cooperacao', 'Cooperacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for objetividade field
            //
            $column = new TextViewColumn('objetividade', 'Objetividade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for produtividade field
            //
            $column = new TextViewColumn('produtividade', 'Produtividade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for empatia field
            //
            $column = new TextViewColumn('empatia', 'Empatia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for flexibilidade field
            //
            $column = new TextViewColumn('flexibilidade', 'Flexibilidade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for criativade field
            //
            $column = new TextViewColumn('criativade', 'Criativade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for equilibrio_emocional field
            //
            $column = new TextViewColumn('equilibrio_emocional', 'Equilibrio Emocional', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for conceito_final field
            //
            $column = new TextViewColumn('conceito_final', 'Conceito Final', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for parecer field
            //
            $column = new TextViewColumn('parecer', 'Parecer', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }

        public function GetPageDirection()
        {
            return null;
        }

        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }

        function GetCustomClientScript()
        {
            return ;
        }

        function GetOnPageLoadedClientScript()
        {
            return ;
        }
        public function ShowEditButtonHandler(&$show)
        {
            if ($this->GetRecordPermission() != null)
                $show = $this->GetRecordPermission()->HasEditGrant($this->GetDataset());
        }
        public function ShowDeleteButtonHandler(&$show)
        {
            if ($this->GetRecordPermission() != null)
                $show = $this->GetRecordPermission()->HasDeleteGrant($this->GetDataset());
        }

        public function GetModalGridDeleteHandler() { return 'estagio_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }

        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'estagioGrid');
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(false);
            else
               $result->SetAllowDeleteSelected(false);

            ApplyCommonPageSettings($this, $result);

            $result->SetUseImagesForActions(false);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);

            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->CreateGridSearchControl($result);
            $this->CreateGridAdvancedSearchControl($result);
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);

            $this->SetShowPageList(true);
            $this->SetHidePageListByDefault(false);
            $this->SetExportToExcelAvailable(false);
            $this->SetExportToWordAvailable(false);
            $this->SetExportToXmlAvailable(false);
            $this->SetExportToCsvAvailable(false);
            $this->SetExportToPdfAvailable(false);
            $this->SetPrinterFriendlyAvailable(false);
            $this->SetSimpleSearchAvailable(true);
            $this->SetAdvancedSearchAvailable(false);
            $this->SetFilterRowAvailable(false);
            $this->SetVisualEffectsEnabled(false);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);

            //
            // Http Handlers
            //
            //
            // View column for motivo_continuar_area field
            //
            $column = new TextViewColumn('motivo_continuar_area', 'Motivo Continuar Area', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_motivo_continuar_area_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for pontos_positivo_negativos field
            //
            $column = new TextViewColumn('pontos_positivo_negativos', 'Pontos Positivo Negativos', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_pontos_positivo_negativos_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for conhecimentos_estagios field
            //
            $column = new TextViewColumn('conhecimentos_estagios', 'Conhecimentos Estagios', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_conhecimentos_estagios_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for atividades_desenvolvidas field
            //
            $column = new TextViewColumn('atividades_desenvolvidas', 'Atividades Desenvolvidas', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_atividades_desenvolvidas_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for contribuicao_tecnica field
            //
            $column = new TextViewColumn('contribuicao_tecnica', 'Contribuicao Tecnica', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_contribuicao_tecnica_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for conhecimento_x_atividades field
            //
            $column = new TextViewColumn('conhecimento_x_atividades', 'Conhecimento X Atividades', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_conhecimento_x_atividades_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for sugestoes field
            //
            $column = new TextViewColumn('sugestoes', 'Sugestoes', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_sugestoes_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for atividade_estagiario field
            //
            $column = new TextViewColumn('atividade_estagiario', 'Atividade Estagiario', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_atividade_estagiario_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for equipamentos_utilizados field
            //
            $column = new TextViewColumn('equipamentos_utilizados', 'Equipamentos Utilizados', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_equipamentos_utilizados_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for sugestao_ensino_instituicao field
            //
            $column = new TextViewColumn('sugestao_ensino_instituicao', 'Sugestao Ensino Instituicao', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_sugestao_ensino_instituicao_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for dificuldades_estagio field
            //
            $column = new TextViewColumn('dificuldades_estagio', 'Dificuldades Estagio', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_dificuldades_estagio_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for parecer field
            //
            $column = new TextViewColumn('parecer', 'Parecer', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_parecer_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for motivo_continuar_area field
            //
            $column = new TextViewColumn('motivo_continuar_area', 'Motivo Continuar Area', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_motivo_continuar_area_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for pontos_positivo_negativos field
            //
            $column = new TextViewColumn('pontos_positivo_negativos', 'Pontos Positivo Negativos', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_pontos_positivo_negativos_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for conhecimentos_estagios field
            //
            $column = new TextViewColumn('conhecimentos_estagios', 'Conhecimentos Estagios', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_conhecimentos_estagios_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for atividades_desenvolvidas field
            //
            $column = new TextViewColumn('atividades_desenvolvidas', 'Atividades Desenvolvidas', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_atividades_desenvolvidas_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for contribuicao_tecnica field
            //
            $column = new TextViewColumn('contribuicao_tecnica', 'Contribuicao Tecnica', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_contribuicao_tecnica_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for conhecimento_x_atividades field
            //
            $column = new TextViewColumn('conhecimento_x_atividades', 'Conhecimento X Atividades', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_conhecimento_x_atividades_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for sugestoes field
            //
            $column = new TextViewColumn('sugestoes', 'Sugestoes', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_sugestoes_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for atividade_estagiario field
            //
            $column = new TextViewColumn('atividade_estagiario', 'Atividade Estagiario', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_atividade_estagiario_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for equipamentos_utilizados field
            //
            $column = new TextViewColumn('equipamentos_utilizados', 'Equipamentos Utilizados', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_equipamentos_utilizados_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for sugestao_ensino_instituicao field
            //
            $column = new TextViewColumn('sugestao_ensino_instituicao', 'Sugestao Ensino Instituicao', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_sugestao_ensino_instituicao_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for dificuldades_estagio field
            //
            $column = new TextViewColumn('dificuldades_estagio', 'Dificuldades Estagio', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_dificuldades_estagio_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for parecer field
            //
            $column = new TextViewColumn('parecer', 'Parecer', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'estagioGrid_parecer_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            return $result;
        }

        public function OpenAdvancedSearchByDefault()
        {
            return false;
        }

        protected function DoGetGridHeader()
        {
            return '';
        }
    }



    try
    {
        $Page = new estagioPage("estagio.php", "estagio", GetCurrentUserGrantForDataSource("estagio"), 'UTF-8');
        $Page->SetShortCaption('Estagio');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('Estagio');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("estagio"));
        GetApplication()->SetEnableLessRunTimeCompile(GetEnableLessFilesRunTimeCompilation());
        GetApplication()->SetCanUserChangeOwnPassword(
            !function_exists('CanUserChangeOwnPassword') || CanUserChangeOwnPassword());
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e->getMessage());
    }
  }else{
      //header("location: ../erro.html");

  }
