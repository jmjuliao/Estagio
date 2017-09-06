<?php
session_start();
if (!empty($_SESSION['nivelAcesso']) && ($_SESSION['nivelAcesso'] == 'ad')){
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



    class professorPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`professor`');
            $field = new StringField('siape');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('nome_professor');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('cod_curso');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $this->dataset->AddLookupField('cod_curso', 'curso', new StringField('cod_curso'), new StringField('nome_curso', 'cod_curso_nome_curso', 'cod_curso_nome_curso_curso'), 'cod_curso_nome_curso_curso');
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
            if (GetCurrentUserGrantForDataSource('aluno')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Aluno'), 'aluno.php', $this->RenderText('Aluno'), $currentPageCaption == $this->RenderText('Aluno'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('atividade')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Atividade'), 'atividade.php', $this->RenderText('Atividade'), $currentPageCaption == $this->RenderText('Atividade'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('curso')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Curso'), 'curso.php', $this->RenderText('Curso'), $currentPageCaption == $this->RenderText('Curso'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('empresa')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Empresa'), 'empresa.php', $this->RenderText('Empresa'), $currentPageCaption == $this->RenderText('Empresa'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('professor')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Professor'), 'professor.php', $this->RenderText('Professor'), $currentPageCaption == $this->RenderText('Professor'), false, $this->RenderText('Default')));

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
            $grid->SearchControl = new SimpleSearch('professorssearch', $this->dataset,
                array('siape', 'nome_professor', 'cod_curso_nome_curso'),
                array($this->RenderText('Siape'), $this->RenderText('Nome Professor'), $this->RenderText('Cod Curso')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('professorasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->setTimerInterval(1000);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('siape', $this->RenderText('Siape')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('nome_professor', $this->RenderText('Nome Professor')));

            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`curso`');
            $field = new StringField('cod_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('nome_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('nome_curso', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('cod_curso', $this->RenderText('Cod Curso'), $lookupDataset, 'cod_curso', 'nome_curso', false, 8));
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
            // View column for siape field
            //
            $column = new TextViewColumn('siape', 'Siape', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for nome_professor field
            //
            $column = new TextViewColumn('nome_professor', 'Nome Professor', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);

            //
            // View column for nome_curso field
            //
            $column = new TextViewColumn('cod_curso_nome_curso', 'Cod Curso', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }

        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for siape field
            //
            $column = new TextViewColumn('siape', 'Siape', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for nome_professor field
            //
            $column = new TextViewColumn('nome_professor', 'Nome Professor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);

            //
            // View column for nome_curso field
            //
            $column = new TextViewColumn('cod_curso_nome_curso', 'Cod Curso', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }

        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for siape field
            //
            $editor = new TextEdit('siape_edit');
            $editor->SetSize(7);
            $editor->SetMaxLength(7);
            $editColumn = new CustomEditColumn('Siape', 'siape', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for nome_professor field
            //
            $editor = new TextEdit('nome_professor_edit');
            $editor->SetSize(50);
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Nome Professor', 'nome_professor', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);

            //
            // Edit column for cod_curso field
            //
            $editor = new ComboBox('cod_curso_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`curso`');
            $field = new StringField('cod_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('nome_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('nome_curso', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Cod Curso',
                'cod_curso',
                $editor,
                $this->dataset, 'cod_curso', 'nome_curso', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }

        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for siape field
            //
            $editor = new TextEdit('siape_edit');
            $editor->SetSize(7);
            $editor->SetMaxLength(7);
            $editColumn = new CustomEditColumn('Siape', 'siape', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for nome_professor field
            //
            $editor = new TextEdit('nome_professor_edit');
            $editor->SetSize(50);
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Nome Professor', 'nome_professor', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);

            //
            // Edit column for cod_curso field
            //
            $editor = new ComboBox('cod_curso_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`curso`');
            $field = new StringField('cod_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('nome_curso');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('nome_curso', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Cod Curso',
                'cod_curso',
                $editor,
                $this->dataset, 'cod_curso', 'nome_curso', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
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
            // View column for siape field
            //
            $column = new TextViewColumn('siape', 'Siape', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for nome_professor field
            //
            $column = new TextViewColumn('nome_professor', 'Nome Professor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);

            //
            // View column for nome_curso field
            //
            $column = new TextViewColumn('cod_curso_nome_curso', 'Cod Curso', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }

        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for siape field
            //
            $column = new TextViewColumn('siape', 'Siape', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for nome_professor field
            //
            $column = new TextViewColumn('nome_professor', 'Nome Professor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);

            //
            // View column for nome_curso field
            //
            $column = new TextViewColumn('cod_curso_nome_curso', 'Cod Curso', $this->dataset);
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

        public function GetModalGridDeleteHandler() { return 'professor_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }

        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'professorGrid');
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
        $Page = new professorPage("professor.php", "professor", GetCurrentUserGrantForDataSource("professor"), 'UTF-8');
        $Page->SetShortCaption('Professor');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('Professor');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("professor"));
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
