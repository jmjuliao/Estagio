<?php
session_start();
if (!empty($_SESSION['nivelAcesso']) && ($_SESSION['nivelAcesso'] == 'pf')){
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



    class relatorio_periodicoPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`relatorio_periodico`');
            $field = new StringField('matricula');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('cnpj');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('data_relatorio');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('avaliacao_supervisao_recebida');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_orientacao_tecnica');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_prazos_atividade');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_auxilio_duvidas');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_relacao_supervisor');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_relacao_funcionarios');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_orientacao_seguranca');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_condicoes_seguras_trabalho');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_aplicao_pratica_conhecimentos');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_complemento_ensino');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_evolucao_relacionamento_interpessoal');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_condicoes_fisicas');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_condicoes_trabalho_limpeza');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_diversificacao_modernizacao_ferramentas');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('obtencao_estagio');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('descricao_atividades_desenvolvidas');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('conhecimento_tecnicos_aplicados');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('pontos_positivos_negativos_estagio');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('empresa_como_melhorar_nivel_estagio');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('ifes_como_melhorar_nivel_estagio');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('comentarios');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_estagio_atendeu_objetivo');
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_estagio_complemento_curso');
            $this->dataset->AddField($field, false);
            $field = new StringField('avaliacao_interessante_visita_local_estagio');
            $this->dataset->AddField($field, false);
            $field = new StringField('comentarios_gerais_orientador');
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('matricula', 'aluno', new StringField('matricula'), new StringField('nome_aluno', 'matricula_nome_aluno', 'matricula_nome_aluno_aluno'), 'matricula_nome_aluno_aluno');
            $this->dataset->AddLookupField('cnpj', 'empresa', new StringField('cnpj'), new StringField('nome_empresa', 'cnpj_nome_empresa', 'cnpj_nome_empresa_empresa'), 'cnpj_nome_empresa_empresa');
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
            $grid->SearchControl = new SimpleSearch('relatorio_periodicossearch', $this->dataset,
                array('matricula_nome_aluno', 'cnpj_nome_empresa', 'data_relatorio', 'avaliacao_supervisao_recebida', 'avaliacao_orientacao_tecnica', 'avaliacao_prazos_atividade', 'avaliacao_auxilio_duvidas', 'avaliacao_relacao_supervisor', 'avaliacao_relacao_funcionarios', 'avaliacao_orientacao_seguranca', 'avaliacao_condicoes_seguras_trabalho', 'avaliacao_aplicao_pratica_conhecimentos', 'avaliacao_complemento_ensino', 'avaliacao_evolucao_relacionamento_interpessoal', 'avaliacao_condicoes_fisicas', 'avaliacao_condicoes_trabalho_limpeza', 'avaliacao_diversificacao_modernizacao_ferramentas', 'obtencao_estagio', 'descricao_atividades_desenvolvidas', 'conhecimento_tecnicos_aplicados', 'pontos_positivos_negativos_estagio', 'empresa_como_melhorar_nivel_estagio', 'ifes_como_melhorar_nivel_estagio', 'comentarios', 'avaliacao_estagio_atendeu_objetivo', 'avaliacao_estagio_complemento_curso', 'avaliacao_interessante_visita_local_estagio', 'comentarios_gerais_orientador'),
                array($this->RenderText('Matricula'), $this->RenderText('Cnpj'), $this->RenderText('Data Relatorio'), $this->RenderText('Avaliacao Supervisao Recebida'), $this->RenderText('Avaliacao Orientacao Tecnica'), $this->RenderText('Avaliacao Prazos Atividade'), $this->RenderText('Avaliacao Auxilio Duvidas'), $this->RenderText('Avaliacao Relacao Supervisor'), $this->RenderText('Avaliacao Relacao Funcionarios'), $this->RenderText('Avaliacao Orientacao Seguranca'), $this->RenderText('Avaliacao Condicoes Seguras Trabalho'), $this->RenderText('Avaliacao Aplicao Pratica Conhecimentos'), $this->RenderText('Avaliacao Complemento Ensino'), $this->RenderText('Avaliacao Evolucao Relacionamento Interpessoal'), $this->RenderText('Avaliacao Condicoes Fisicas'), $this->RenderText('Avaliacao Condicoes Trabalho Limpeza'), $this->RenderText('Avaliacao Diversificacao Modernizacao Ferramentas'), $this->RenderText('Obtencao Estagio'), $this->RenderText('Descricao Atividades Desenvolvidas'), $this->RenderText('Conhecimento Tecnicos Aplicados'), $this->RenderText('Pontos Positivos Negativos Estagio'), $this->RenderText('Empresa Como Melhorar Nivel Estagio'), $this->RenderText('Ifes Como Melhorar Nivel Estagio'), $this->RenderText('Comentarios'), $this->RenderText('Avaliacao Estagio Atendeu Objetivo'), $this->RenderText('Avaliacao Estagio Complemento Curso'), $this->RenderText('Avaliacao Interessante Visita Local Estagio'), $this->RenderText('Comentarios Gerais Orientador')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('relatorio_periodicoasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
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
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('data_relatorio', $this->RenderText('Data Relatorio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_supervisao_recebida', $this->RenderText('Avaliacao Supervisao Recebida')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_orientacao_tecnica', $this->RenderText('Avaliacao Orientacao Tecnica')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_prazos_atividade', $this->RenderText('Avaliacao Prazos Atividade')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_auxilio_duvidas', $this->RenderText('Avaliacao Auxilio Duvidas')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_relacao_supervisor', $this->RenderText('Avaliacao Relacao Supervisor')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_relacao_funcionarios', $this->RenderText('Avaliacao Relacao Funcionarios')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_orientacao_seguranca', $this->RenderText('Avaliacao Orientacao Seguranca')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_condicoes_seguras_trabalho', $this->RenderText('Avaliacao Condicoes Seguras Trabalho')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_aplicao_pratica_conhecimentos', $this->RenderText('Avaliacao Aplicao Pratica Conhecimentos')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_complemento_ensino', $this->RenderText('Avaliacao Complemento Ensino')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_evolucao_relacionamento_interpessoal', $this->RenderText('Avaliacao Evolucao Relacionamento Interpessoal')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_condicoes_fisicas', $this->RenderText('Avaliacao Condicoes Fisicas')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_condicoes_trabalho_limpeza', $this->RenderText('Avaliacao Condicoes Trabalho Limpeza')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_diversificacao_modernizacao_ferramentas', $this->RenderText('Avaliacao Diversificacao Modernizacao Ferramentas')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('obtencao_estagio', $this->RenderText('Obtencao Estagio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('descricao_atividades_desenvolvidas', $this->RenderText('Descricao Atividades Desenvolvidas')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('conhecimento_tecnicos_aplicados', $this->RenderText('Conhecimento Tecnicos Aplicados')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('pontos_positivos_negativos_estagio', $this->RenderText('Pontos Positivos Negativos Estagio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('empresa_como_melhorar_nivel_estagio', $this->RenderText('Empresa Como Melhorar Nivel Estagio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('ifes_como_melhorar_nivel_estagio', $this->RenderText('Ifes Como Melhorar Nivel Estagio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('comentarios', $this->RenderText('Comentarios')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_estagio_atendeu_objetivo', $this->RenderText('Avaliacao Estagio Atendeu Objetivo')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_estagio_complemento_curso', $this->RenderText('Avaliacao Estagio Complemento Curso')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('avaliacao_interessante_visita_local_estagio', $this->RenderText('Avaliacao Interessante Visita Local Estagio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('comentarios_gerais_orientador', $this->RenderText('Comentarios Gerais Orientador')));
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
            // View column for data_relatorio field
            //
            $column = new TextViewColumn('data_relatorio', 'Data Relatorio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_supervisao_recebida field
            //
            $column = new TextViewColumn('avaliacao_supervisao_recebida', 'Avaliacao Supervisao Recebida', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_orientacao_tecnica field
            //
            $column = new TextViewColumn('avaliacao_orientacao_tecnica', 'Avaliacao Orientacao Tecnica', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_prazos_atividade field
            //
            $column = new TextViewColumn('avaliacao_prazos_atividade', 'Avaliacao Prazos Atividade', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_auxilio_duvidas field
            //
            $column = new TextViewColumn('avaliacao_auxilio_duvidas', 'Avaliacao Auxilio Duvidas', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_relacao_supervisor field
            //
            $column = new TextViewColumn('avaliacao_relacao_supervisor', 'Avaliacao Relacao Supervisor', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_relacao_funcionarios field
            //
            $column = new TextViewColumn('avaliacao_relacao_funcionarios', 'Avaliacao Relacao Funcionarios', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_orientacao_seguranca field
            //
            $column = new TextViewColumn('avaliacao_orientacao_seguranca', 'Avaliacao Orientacao Seguranca', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_condicoes_seguras_trabalho field
            //
            $column = new TextViewColumn('avaliacao_condicoes_seguras_trabalho', 'Avaliacao Condicoes Seguras Trabalho', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_aplicao_pratica_conhecimentos field
            //
            $column = new TextViewColumn('avaliacao_aplicao_pratica_conhecimentos', 'Avaliacao Aplicao Pratica Conhecimentos', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_complemento_ensino field
            //
            $column = new TextViewColumn('avaliacao_complemento_ensino', 'Avaliacao Complemento Ensino', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_evolucao_relacionamento_interpessoal field
            //
            $column = new TextViewColumn('avaliacao_evolucao_relacionamento_interpessoal', 'Avaliacao Evolucao Relacionamento Interpessoal', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_condicoes_fisicas field
            //
            $column = new TextViewColumn('avaliacao_condicoes_fisicas', 'Avaliacao Condicoes Fisicas', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_condicoes_trabalho_limpeza field
            //
            $column = new TextViewColumn('avaliacao_condicoes_trabalho_limpeza', 'Avaliacao Condicoes Trabalho Limpeza', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_diversificacao_modernizacao_ferramentas field
            //
            $column = new TextViewColumn('avaliacao_diversificacao_modernizacao_ferramentas', 'Avaliacao Diversificacao Modernizacao Ferramentas', $this->dataset);
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
            // View column for descricao_atividades_desenvolvidas field
            //
            $column = new TextViewColumn('descricao_atividades_desenvolvidas', 'Descricao Atividades Desenvolvidas', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('relatorio_periodicoGrid_descricao_atividades_desenvolvidas_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for conhecimento_tecnicos_aplicados field
            //
            $column = new TextViewColumn('conhecimento_tecnicos_aplicados', 'Conhecimento Tecnicos Aplicados', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('relatorio_periodicoGrid_conhecimento_tecnicos_aplicados_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for pontos_positivos_negativos_estagio field
            //
            $column = new TextViewColumn('pontos_positivos_negativos_estagio', 'Pontos Positivos Negativos Estagio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('relatorio_periodicoGrid_pontos_positivos_negativos_estagio_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for empresa_como_melhorar_nivel_estagio field
            //
            $column = new TextViewColumn('empresa_como_melhorar_nivel_estagio', 'Empresa Como Melhorar Nivel Estagio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('relatorio_periodicoGrid_empresa_como_melhorar_nivel_estagio_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for ifes_como_melhorar_nivel_estagio field
            //
            $column = new TextViewColumn('ifes_como_melhorar_nivel_estagio', 'Ifes Como Melhorar Nivel Estagio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('relatorio_periodicoGrid_ifes_como_melhorar_nivel_estagio_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for comentarios field
            //
            $column = new TextViewColumn('comentarios', 'Comentarios', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('relatorio_periodicoGrid_comentarios_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_estagio_atendeu_objetivo field
            //
            $column = new TextViewColumn('avaliacao_estagio_atendeu_objetivo', 'Avaliacao Estagio Atendeu Objetivo', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_estagio_complemento_curso field
            //
            $column = new TextViewColumn('avaliacao_estagio_complemento_curso', 'Avaliacao Estagio Complemento Curso', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for avaliacao_interessante_visita_local_estagio field
            //
            $column = new TextViewColumn('avaliacao_interessante_visita_local_estagio', 'Avaliacao Interessante Visita Local Estagio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for comentarios_gerais_orientador field
            //
            $column = new TextViewColumn('comentarios_gerais_orientador', 'Comentarios Gerais Orientador', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('relatorio_periodicoGrid_comentarios_gerais_orientador_handler_list');
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
            // View column for data_relatorio field
            //
            $column = new TextViewColumn('data_relatorio', 'Data Relatorio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_supervisao_recebida field
            //
            $column = new TextViewColumn('avaliacao_supervisao_recebida', 'Avaliacao Supervisao Recebida', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_orientacao_tecnica field
            //
            $column = new TextViewColumn('avaliacao_orientacao_tecnica', 'Avaliacao Orientacao Tecnica', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_prazos_atividade field
            //
            $column = new TextViewColumn('avaliacao_prazos_atividade', 'Avaliacao Prazos Atividade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_auxilio_duvidas field
            //
            $column = new TextViewColumn('avaliacao_auxilio_duvidas', 'Avaliacao Auxilio Duvidas', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_relacao_supervisor field
            //
            $column = new TextViewColumn('avaliacao_relacao_supervisor', 'Avaliacao Relacao Supervisor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_relacao_funcionarios field
            //
            $column = new TextViewColumn('avaliacao_relacao_funcionarios', 'Avaliacao Relacao Funcionarios', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_orientacao_seguranca field
            //
            $column = new TextViewColumn('avaliacao_orientacao_seguranca', 'Avaliacao Orientacao Seguranca', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_condicoes_seguras_trabalho field
            //
            $column = new TextViewColumn('avaliacao_condicoes_seguras_trabalho', 'Avaliacao Condicoes Seguras Trabalho', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_aplicao_pratica_conhecimentos field
            //
            $column = new TextViewColumn('avaliacao_aplicao_pratica_conhecimentos', 'Avaliacao Aplicao Pratica Conhecimentos', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_complemento_ensino field
            //
            $column = new TextViewColumn('avaliacao_complemento_ensino', 'Avaliacao Complemento Ensino', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_evolucao_relacionamento_interpessoal field
            //
            $column = new TextViewColumn('avaliacao_evolucao_relacionamento_interpessoal', 'Avaliacao Evolucao Relacionamento Interpessoal', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_condicoes_fisicas field
            //
            $column = new TextViewColumn('avaliacao_condicoes_fisicas', 'Avaliacao Condicoes Fisicas', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_condicoes_trabalho_limpeza field
            //
            $column = new TextViewColumn('avaliacao_condicoes_trabalho_limpeza', 'Avaliacao Condicoes Trabalho Limpeza', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_diversificacao_modernizacao_ferramentas field
            //
            $column = new TextViewColumn('avaliacao_diversificacao_modernizacao_ferramentas', 'Avaliacao Diversificacao Modernizacao Ferramentas', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for obtencao_estagio field
            //
            $column = new TextViewColumn('obtencao_estagio', 'Obtencao Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for descricao_atividades_desenvolvidas field
            //
            $column = new TextViewColumn('descricao_atividades_desenvolvidas', 'Descricao Atividades Desenvolvidas', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('relatorio_periodicoGrid_descricao_atividades_desenvolvidas_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for conhecimento_tecnicos_aplicados field
            //
            $column = new TextViewColumn('conhecimento_tecnicos_aplicados', 'Conhecimento Tecnicos Aplicados', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('relatorio_periodicoGrid_conhecimento_tecnicos_aplicados_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for pontos_positivos_negativos_estagio field
            //
            $column = new TextViewColumn('pontos_positivos_negativos_estagio', 'Pontos Positivos Negativos Estagio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('relatorio_periodicoGrid_pontos_positivos_negativos_estagio_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for empresa_como_melhorar_nivel_estagio field
            //
            $column = new TextViewColumn('empresa_como_melhorar_nivel_estagio', 'Empresa Como Melhorar Nivel Estagio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('relatorio_periodicoGrid_empresa_como_melhorar_nivel_estagio_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for ifes_como_melhorar_nivel_estagio field
            //
            $column = new TextViewColumn('ifes_como_melhorar_nivel_estagio', 'Ifes Como Melhorar Nivel Estagio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('relatorio_periodicoGrid_ifes_como_melhorar_nivel_estagio_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for comentarios field
            //
            $column = new TextViewColumn('comentarios', 'Comentarios', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('relatorio_periodicoGrid_comentarios_handler_view');
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_estagio_atendeu_objetivo field
            //
            $column = new TextViewColumn('avaliacao_estagio_atendeu_objetivo', 'Avaliacao Estagio Atendeu Objetivo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_estagio_complemento_curso field
            //
            $column = new TextViewColumn('avaliacao_estagio_complemento_curso', 'Avaliacao Estagio Complemento Curso', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for avaliacao_interessante_visita_local_estagio field
            //
            $column = new TextViewColumn('avaliacao_interessante_visita_local_estagio', 'Avaliacao Interessante Visita Local Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for comentarios_gerais_orientador field
            //
            $column = new TextViewColumn('comentarios_gerais_orientador', 'Comentarios Gerais Orientador', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('relatorio_periodicoGrid_comentarios_gerais_orientador_handler_view');
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
            // Edit column for data_relatorio field
            //
            $editor = new TextEdit('data_relatorio_edit');
            $editor->SetSize(10);
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('Data Relatorio', 'data_relatorio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_supervisao_recebida field
            //
            $editor = new TextEdit('avaliacao_supervisao_recebida_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Supervisao Recebida', 'avaliacao_supervisao_recebida', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_orientacao_tecnica field
            //
            $editor = new TextEdit('avaliacao_orientacao_tecnica_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Orientacao Tecnica', 'avaliacao_orientacao_tecnica', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_prazos_atividade field
            //
            $editor = new TextEdit('avaliacao_prazos_atividade_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Prazos Atividade', 'avaliacao_prazos_atividade', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_auxilio_duvidas field
            //
            $editor = new TextEdit('avaliacao_auxilio_duvidas_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Auxilio Duvidas', 'avaliacao_auxilio_duvidas', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_relacao_supervisor field
            //
            $editor = new TextEdit('avaliacao_relacao_supervisor_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Relacao Supervisor', 'avaliacao_relacao_supervisor', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_relacao_funcionarios field
            //
            $editor = new TextEdit('avaliacao_relacao_funcionarios_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Relacao Funcionarios', 'avaliacao_relacao_funcionarios', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_orientacao_seguranca field
            //
            $editor = new TextEdit('avaliacao_orientacao_seguranca_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Orientacao Seguranca', 'avaliacao_orientacao_seguranca', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_condicoes_seguras_trabalho field
            //
            $editor = new TextEdit('avaliacao_condicoes_seguras_trabalho_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Condicoes Seguras Trabalho', 'avaliacao_condicoes_seguras_trabalho', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_aplicao_pratica_conhecimentos field
            //
            $editor = new TextEdit('avaliacao_aplicao_pratica_conhecimentos_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Aplicao Pratica Conhecimentos', 'avaliacao_aplicao_pratica_conhecimentos', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_complemento_ensino field
            //
            $editor = new TextEdit('avaliacao_complemento_ensino_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Complemento Ensino', 'avaliacao_complemento_ensino', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_evolucao_relacionamento_interpessoal field
            //
            $editor = new TextEdit('avaliacao_evolucao_relacionamento_interpessoal_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Evolucao Relacionamento Interpessoal', 'avaliacao_evolucao_relacionamento_interpessoal', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_condicoes_fisicas field
            //
            $editor = new TextEdit('avaliacao_condicoes_fisicas_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Condicoes Fisicas', 'avaliacao_condicoes_fisicas', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_condicoes_trabalho_limpeza field
            //
            $editor = new TextEdit('avaliacao_condicoes_trabalho_limpeza_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Condicoes Trabalho Limpeza', 'avaliacao_condicoes_trabalho_limpeza', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_diversificacao_modernizacao_ferramentas field
            //
            $editor = new TextEdit('avaliacao_diversificacao_modernizacao_ferramentas_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Diversificacao Modernizacao Ferramentas', 'avaliacao_diversificacao_modernizacao_ferramentas', $editor, $this->dataset);
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
            // Edit column for descricao_atividades_desenvolvidas field
            //
            $editor = new TextAreaEdit('descricao_atividades_desenvolvidas_edit', 50, 8);
            $editColumn = new CustomEditColumn('Descricao Atividades Desenvolvidas', 'descricao_atividades_desenvolvidas', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for conhecimento_tecnicos_aplicados field
            //
            $editor = new TextAreaEdit('conhecimento_tecnicos_aplicados_edit', 50, 8);
            $editColumn = new CustomEditColumn('Conhecimento Tecnicos Aplicados', 'conhecimento_tecnicos_aplicados', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for pontos_positivos_negativos_estagio field
            //
            $editor = new TextAreaEdit('pontos_positivos_negativos_estagio_edit', 50, 8);
            $editColumn = new CustomEditColumn('Pontos Positivos Negativos Estagio', 'pontos_positivos_negativos_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for empresa_como_melhorar_nivel_estagio field
            //
            $editor = new TextAreaEdit('empresa_como_melhorar_nivel_estagio_edit', 50, 8);
            $editColumn = new CustomEditColumn('Empresa Como Melhorar Nivel Estagio', 'empresa_como_melhorar_nivel_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for ifes_como_melhorar_nivel_estagio field
            //
            $editor = new TextAreaEdit('ifes_como_melhorar_nivel_estagio_edit', 50, 8);
            $editColumn = new CustomEditColumn('Ifes Como Melhorar Nivel Estagio', 'ifes_como_melhorar_nivel_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for comentarios field
            //
            $editor = new TextAreaEdit('comentarios_edit', 50, 8);
            $editColumn = new CustomEditColumn('Comentarios', 'comentarios', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_estagio_atendeu_objetivo field
            //
            $editor = new TextEdit('avaliacao_estagio_atendeu_objetivo_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Estagio Atendeu Objetivo', 'avaliacao_estagio_atendeu_objetivo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_estagio_complemento_curso field
            //
            $editor = new TextEdit('avaliacao_estagio_complemento_curso_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Estagio Complemento Curso', 'avaliacao_estagio_complemento_curso', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for avaliacao_interessante_visita_local_estagio field
            //
            $editor = new TextEdit('avaliacao_interessante_visita_local_estagio_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Interessante Visita Local Estagio', 'avaliacao_interessante_visita_local_estagio', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for comentarios_gerais_orientador field
            //
            $editor = new TextAreaEdit('comentarios_gerais_orientador_edit', 50, 8);
            $editColumn = new CustomEditColumn('Comentarios Gerais Orientador', 'comentarios_gerais_orientador', $editor, $this->dataset);
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
            // Edit column for data_relatorio field
            //
            $editor = new TextEdit('data_relatorio_edit');
            $editor->SetSize(10);
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('Data Relatorio', 'data_relatorio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_supervisao_recebida field
            //
            $editor = new TextEdit('avaliacao_supervisao_recebida_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Supervisao Recebida', 'avaliacao_supervisao_recebida', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_orientacao_tecnica field
            //
            $editor = new TextEdit('avaliacao_orientacao_tecnica_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Orientacao Tecnica', 'avaliacao_orientacao_tecnica', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_prazos_atividade field
            //
            $editor = new TextEdit('avaliacao_prazos_atividade_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Prazos Atividade', 'avaliacao_prazos_atividade', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_auxilio_duvidas field
            //
            $editor = new TextEdit('avaliacao_auxilio_duvidas_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Auxilio Duvidas', 'avaliacao_auxilio_duvidas', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_relacao_supervisor field
            //
            $editor = new TextEdit('avaliacao_relacao_supervisor_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Relacao Supervisor', 'avaliacao_relacao_supervisor', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_relacao_funcionarios field
            //
            $editor = new TextEdit('avaliacao_relacao_funcionarios_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Relacao Funcionarios', 'avaliacao_relacao_funcionarios', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_orientacao_seguranca field
            //
            $editor = new TextEdit('avaliacao_orientacao_seguranca_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Orientacao Seguranca', 'avaliacao_orientacao_seguranca', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_condicoes_seguras_trabalho field
            //
            $editor = new TextEdit('avaliacao_condicoes_seguras_trabalho_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Condicoes Seguras Trabalho', 'avaliacao_condicoes_seguras_trabalho', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_aplicao_pratica_conhecimentos field
            //
            $editor = new TextEdit('avaliacao_aplicao_pratica_conhecimentos_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Aplicao Pratica Conhecimentos', 'avaliacao_aplicao_pratica_conhecimentos', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_complemento_ensino field
            //
            $editor = new TextEdit('avaliacao_complemento_ensino_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Complemento Ensino', 'avaliacao_complemento_ensino', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_evolucao_relacionamento_interpessoal field
            //
            $editor = new TextEdit('avaliacao_evolucao_relacionamento_interpessoal_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Evolucao Relacionamento Interpessoal', 'avaliacao_evolucao_relacionamento_interpessoal', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_condicoes_fisicas field
            //
            $editor = new TextEdit('avaliacao_condicoes_fisicas_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Condicoes Fisicas', 'avaliacao_condicoes_fisicas', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_condicoes_trabalho_limpeza field
            //
            $editor = new TextEdit('avaliacao_condicoes_trabalho_limpeza_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Condicoes Trabalho Limpeza', 'avaliacao_condicoes_trabalho_limpeza', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_diversificacao_modernizacao_ferramentas field
            //
            $editor = new TextEdit('avaliacao_diversificacao_modernizacao_ferramentas_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Diversificacao Modernizacao Ferramentas', 'avaliacao_diversificacao_modernizacao_ferramentas', $editor, $this->dataset);
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
            // Edit column for descricao_atividades_desenvolvidas field
            //
            $editor = new TextAreaEdit('descricao_atividades_desenvolvidas_edit', 50, 8);
            $editColumn = new CustomEditColumn('Descricao Atividades Desenvolvidas', 'descricao_atividades_desenvolvidas', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for conhecimento_tecnicos_aplicados field
            //
            $editor = new TextAreaEdit('conhecimento_tecnicos_aplicados_edit', 50, 8);
            $editColumn = new CustomEditColumn('Conhecimento Tecnicos Aplicados', 'conhecimento_tecnicos_aplicados', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for pontos_positivos_negativos_estagio field
            //
            $editor = new TextAreaEdit('pontos_positivos_negativos_estagio_edit', 50, 8);
            $editColumn = new CustomEditColumn('Pontos Positivos Negativos Estagio', 'pontos_positivos_negativos_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for empresa_como_melhorar_nivel_estagio field
            //
            $editor = new TextAreaEdit('empresa_como_melhorar_nivel_estagio_edit', 50, 8);
            $editColumn = new CustomEditColumn('Empresa Como Melhorar Nivel Estagio', 'empresa_como_melhorar_nivel_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for ifes_como_melhorar_nivel_estagio field
            //
            $editor = new TextAreaEdit('ifes_como_melhorar_nivel_estagio_edit', 50, 8);
            $editColumn = new CustomEditColumn('Ifes Como Melhorar Nivel Estagio', 'ifes_como_melhorar_nivel_estagio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for comentarios field
            //
            $editor = new TextAreaEdit('comentarios_edit', 50, 8);
            $editColumn = new CustomEditColumn('Comentarios', 'comentarios', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_estagio_atendeu_objetivo field
            //
            $editor = new TextEdit('avaliacao_estagio_atendeu_objetivo_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Estagio Atendeu Objetivo', 'avaliacao_estagio_atendeu_objetivo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_estagio_complemento_curso field
            //
            $editor = new TextEdit('avaliacao_estagio_complemento_curso_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Estagio Complemento Curso', 'avaliacao_estagio_complemento_curso', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for avaliacao_interessante_visita_local_estagio field
            //
            $editor = new TextEdit('avaliacao_interessante_visita_local_estagio_edit');
            $editor->SetSize(1);
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('Avaliacao Interessante Visita Local Estagio', 'avaliacao_interessante_visita_local_estagio', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for comentarios_gerais_orientador field
            //
            $editor = new TextAreaEdit('comentarios_gerais_orientador_edit', 50, 8);
            $editColumn = new CustomEditColumn('Comentarios Gerais Orientador', 'comentarios_gerais_orientador', $editor, $this->dataset);
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
            // View column for data_relatorio field
            //
            $column = new TextViewColumn('data_relatorio', 'Data Relatorio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_supervisao_recebida field
            //
            $column = new TextViewColumn('avaliacao_supervisao_recebida', 'Avaliacao Supervisao Recebida', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_orientacao_tecnica field
            //
            $column = new TextViewColumn('avaliacao_orientacao_tecnica', 'Avaliacao Orientacao Tecnica', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_prazos_atividade field
            //
            $column = new TextViewColumn('avaliacao_prazos_atividade', 'Avaliacao Prazos Atividade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_auxilio_duvidas field
            //
            $column = new TextViewColumn('avaliacao_auxilio_duvidas', 'Avaliacao Auxilio Duvidas', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_relacao_supervisor field
            //
            $column = new TextViewColumn('avaliacao_relacao_supervisor', 'Avaliacao Relacao Supervisor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_relacao_funcionarios field
            //
            $column = new TextViewColumn('avaliacao_relacao_funcionarios', 'Avaliacao Relacao Funcionarios', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_orientacao_seguranca field
            //
            $column = new TextViewColumn('avaliacao_orientacao_seguranca', 'Avaliacao Orientacao Seguranca', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_condicoes_seguras_trabalho field
            //
            $column = new TextViewColumn('avaliacao_condicoes_seguras_trabalho', 'Avaliacao Condicoes Seguras Trabalho', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_aplicao_pratica_conhecimentos field
            //
            $column = new TextViewColumn('avaliacao_aplicao_pratica_conhecimentos', 'Avaliacao Aplicao Pratica Conhecimentos', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_complemento_ensino field
            //
            $column = new TextViewColumn('avaliacao_complemento_ensino', 'Avaliacao Complemento Ensino', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_evolucao_relacionamento_interpessoal field
            //
            $column = new TextViewColumn('avaliacao_evolucao_relacionamento_interpessoal', 'Avaliacao Evolucao Relacionamento Interpessoal', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_condicoes_fisicas field
            //
            $column = new TextViewColumn('avaliacao_condicoes_fisicas', 'Avaliacao Condicoes Fisicas', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_condicoes_trabalho_limpeza field
            //
            $column = new TextViewColumn('avaliacao_condicoes_trabalho_limpeza', 'Avaliacao Condicoes Trabalho Limpeza', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_diversificacao_modernizacao_ferramentas field
            //
            $column = new TextViewColumn('avaliacao_diversificacao_modernizacao_ferramentas', 'Avaliacao Diversificacao Modernizacao Ferramentas', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for obtencao_estagio field
            //
            $column = new TextViewColumn('obtencao_estagio', 'Obtencao Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for descricao_atividades_desenvolvidas field
            //
            $column = new TextViewColumn('descricao_atividades_desenvolvidas', 'Descricao Atividades Desenvolvidas', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for conhecimento_tecnicos_aplicados field
            //
            $column = new TextViewColumn('conhecimento_tecnicos_aplicados', 'Conhecimento Tecnicos Aplicados', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for pontos_positivos_negativos_estagio field
            //
            $column = new TextViewColumn('pontos_positivos_negativos_estagio', 'Pontos Positivos Negativos Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for empresa_como_melhorar_nivel_estagio field
            //
            $column = new TextViewColumn('empresa_como_melhorar_nivel_estagio', 'Empresa Como Melhorar Nivel Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for ifes_como_melhorar_nivel_estagio field
            //
            $column = new TextViewColumn('ifes_como_melhorar_nivel_estagio', 'Ifes Como Melhorar Nivel Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for comentarios field
            //
            $column = new TextViewColumn('comentarios', 'Comentarios', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_estagio_atendeu_objetivo field
            //
            $column = new TextViewColumn('avaliacao_estagio_atendeu_objetivo', 'Avaliacao Estagio Atendeu Objetivo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_estagio_complemento_curso field
            //
            $column = new TextViewColumn('avaliacao_estagio_complemento_curso', 'Avaliacao Estagio Complemento Curso', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for avaliacao_interessante_visita_local_estagio field
            //
            $column = new TextViewColumn('avaliacao_interessante_visita_local_estagio', 'Avaliacao Interessante Visita Local Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for comentarios_gerais_orientador field
            //
            $column = new TextViewColumn('comentarios_gerais_orientador', 'Comentarios Gerais Orientador', $this->dataset);
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
            // View column for data_relatorio field
            //
            $column = new TextViewColumn('data_relatorio', 'Data Relatorio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_supervisao_recebida field
            //
            $column = new TextViewColumn('avaliacao_supervisao_recebida', 'Avaliacao Supervisao Recebida', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_orientacao_tecnica field
            //
            $column = new TextViewColumn('avaliacao_orientacao_tecnica', 'Avaliacao Orientacao Tecnica', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_prazos_atividade field
            //
            $column = new TextViewColumn('avaliacao_prazos_atividade', 'Avaliacao Prazos Atividade', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_auxilio_duvidas field
            //
            $column = new TextViewColumn('avaliacao_auxilio_duvidas', 'Avaliacao Auxilio Duvidas', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_relacao_supervisor field
            //
            $column = new TextViewColumn('avaliacao_relacao_supervisor', 'Avaliacao Relacao Supervisor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_relacao_funcionarios field
            //
            $column = new TextViewColumn('avaliacao_relacao_funcionarios', 'Avaliacao Relacao Funcionarios', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_orientacao_seguranca field
            //
            $column = new TextViewColumn('avaliacao_orientacao_seguranca', 'Avaliacao Orientacao Seguranca', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_condicoes_seguras_trabalho field
            //
            $column = new TextViewColumn('avaliacao_condicoes_seguras_trabalho', 'Avaliacao Condicoes Seguras Trabalho', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_aplicao_pratica_conhecimentos field
            //
            $column = new TextViewColumn('avaliacao_aplicao_pratica_conhecimentos', 'Avaliacao Aplicao Pratica Conhecimentos', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_complemento_ensino field
            //
            $column = new TextViewColumn('avaliacao_complemento_ensino', 'Avaliacao Complemento Ensino', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_evolucao_relacionamento_interpessoal field
            //
            $column = new TextViewColumn('avaliacao_evolucao_relacionamento_interpessoal', 'Avaliacao Evolucao Relacionamento Interpessoal', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_condicoes_fisicas field
            //
            $column = new TextViewColumn('avaliacao_condicoes_fisicas', 'Avaliacao Condicoes Fisicas', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_condicoes_trabalho_limpeza field
            //
            $column = new TextViewColumn('avaliacao_condicoes_trabalho_limpeza', 'Avaliacao Condicoes Trabalho Limpeza', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_diversificacao_modernizacao_ferramentas field
            //
            $column = new TextViewColumn('avaliacao_diversificacao_modernizacao_ferramentas', 'Avaliacao Diversificacao Modernizacao Ferramentas', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for obtencao_estagio field
            //
            $column = new TextViewColumn('obtencao_estagio', 'Obtencao Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for descricao_atividades_desenvolvidas field
            //
            $column = new TextViewColumn('descricao_atividades_desenvolvidas', 'Descricao Atividades Desenvolvidas', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for conhecimento_tecnicos_aplicados field
            //
            $column = new TextViewColumn('conhecimento_tecnicos_aplicados', 'Conhecimento Tecnicos Aplicados', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for pontos_positivos_negativos_estagio field
            //
            $column = new TextViewColumn('pontos_positivos_negativos_estagio', 'Pontos Positivos Negativos Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for empresa_como_melhorar_nivel_estagio field
            //
            $column = new TextViewColumn('empresa_como_melhorar_nivel_estagio', 'Empresa Como Melhorar Nivel Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for ifes_como_melhorar_nivel_estagio field
            //
            $column = new TextViewColumn('ifes_como_melhorar_nivel_estagio', 'Ifes Como Melhorar Nivel Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for comentarios field
            //
            $column = new TextViewColumn('comentarios', 'Comentarios', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_estagio_atendeu_objetivo field
            //
            $column = new TextViewColumn('avaliacao_estagio_atendeu_objetivo', 'Avaliacao Estagio Atendeu Objetivo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_estagio_complemento_curso field
            //
            $column = new TextViewColumn('avaliacao_estagio_complemento_curso', 'Avaliacao Estagio Complemento Curso', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for avaliacao_interessante_visita_local_estagio field
            //
            $column = new TextViewColumn('avaliacao_interessante_visita_local_estagio', 'Avaliacao Interessante Visita Local Estagio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for comentarios_gerais_orientador field
            //
            $column = new TextViewColumn('comentarios_gerais_orientador', 'Comentarios Gerais Orientador', $this->dataset);
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

        public function GetModalGridDeleteHandler() { return 'relatorio_periodico_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }

        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'relatorio_periodicoGrid');
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
            // View column for descricao_atividades_desenvolvidas field
            //
            $column = new TextViewColumn('descricao_atividades_desenvolvidas', 'Descricao Atividades Desenvolvidas', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'relatorio_periodicoGrid_descricao_atividades_desenvolvidas_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for conhecimento_tecnicos_aplicados field
            //
            $column = new TextViewColumn('conhecimento_tecnicos_aplicados', 'Conhecimento Tecnicos Aplicados', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'relatorio_periodicoGrid_conhecimento_tecnicos_aplicados_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for pontos_positivos_negativos_estagio field
            //
            $column = new TextViewColumn('pontos_positivos_negativos_estagio', 'Pontos Positivos Negativos Estagio', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'relatorio_periodicoGrid_pontos_positivos_negativos_estagio_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for empresa_como_melhorar_nivel_estagio field
            //
            $column = new TextViewColumn('empresa_como_melhorar_nivel_estagio', 'Empresa Como Melhorar Nivel Estagio', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'relatorio_periodicoGrid_empresa_como_melhorar_nivel_estagio_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for ifes_como_melhorar_nivel_estagio field
            //
            $column = new TextViewColumn('ifes_como_melhorar_nivel_estagio', 'Ifes Como Melhorar Nivel Estagio', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'relatorio_periodicoGrid_ifes_como_melhorar_nivel_estagio_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for comentarios field
            //
            $column = new TextViewColumn('comentarios', 'Comentarios', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'relatorio_periodicoGrid_comentarios_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for comentarios_gerais_orientador field
            //
            $column = new TextViewColumn('comentarios_gerais_orientador', 'Comentarios Gerais Orientador', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'relatorio_periodicoGrid_comentarios_gerais_orientador_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for descricao_atividades_desenvolvidas field
            //
            $column = new TextViewColumn('descricao_atividades_desenvolvidas', 'Descricao Atividades Desenvolvidas', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'relatorio_periodicoGrid_descricao_atividades_desenvolvidas_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for conhecimento_tecnicos_aplicados field
            //
            $column = new TextViewColumn('conhecimento_tecnicos_aplicados', 'Conhecimento Tecnicos Aplicados', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'relatorio_periodicoGrid_conhecimento_tecnicos_aplicados_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for pontos_positivos_negativos_estagio field
            //
            $column = new TextViewColumn('pontos_positivos_negativos_estagio', 'Pontos Positivos Negativos Estagio', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'relatorio_periodicoGrid_pontos_positivos_negativos_estagio_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for empresa_como_melhorar_nivel_estagio field
            //
            $column = new TextViewColumn('empresa_como_melhorar_nivel_estagio', 'Empresa Como Melhorar Nivel Estagio', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'relatorio_periodicoGrid_empresa_como_melhorar_nivel_estagio_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for ifes_como_melhorar_nivel_estagio field
            //
            $column = new TextViewColumn('ifes_como_melhorar_nivel_estagio', 'Ifes Como Melhorar Nivel Estagio', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'relatorio_periodicoGrid_ifes_como_melhorar_nivel_estagio_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for comentarios field
            //
            $column = new TextViewColumn('comentarios', 'Comentarios', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'relatorio_periodicoGrid_comentarios_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for comentarios_gerais_orientador field
            //
            $column = new TextViewColumn('comentarios_gerais_orientador', 'Comentarios Gerais Orientador', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'relatorio_periodicoGrid_comentarios_gerais_orientador_handler_view', $column);
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
        $Page = new relatorio_periodicoPage("relatorio_periodico.php", "relatorio_periodico", GetCurrentUserGrantForDataSource("relatorio_periodico"), 'UTF-8');
        $Page->SetShortCaption('Relatorio Periodico');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('Relatorio Periodico');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("relatorio_periodico"));
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
      header("location: ../erro.html");

  }
