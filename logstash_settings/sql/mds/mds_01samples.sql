SELECT DISTINCT
	SAM.SampleID_sam
	, MEA.MeasurementID_mea
	, SOR.Name					AS	[LA_Name]
	--, MEA.MeasurementID_mea
	--, AUP.Name_aup
	, SOR.Code					AS	[LA_Code]
	, MET.Name_met				AS	[Return_Type]
	, MEN.NationalCode_men		AS	[EDEN_Entity_Code]
	, MEN.Name_men				AS	[Mon_Ent_Name]
	, STA.NationalCode_sta		AS	[Station_National_Code]
	, STA.Name_sta				AS	[Station_Name]
	, SAM.SampleLabCode_sam		AS	[Sample_Code]
	, SAM.Date_sam				AS	[Sample_Date]
	, SAM.CompletionDate_sam	AS	[Sample_Complete_Date]
	, YEAR(SAM.Date_sam)		AS	[Sample_Year]
	--, SAM.SampleID_sam
	--, MEA.MeasurementID_mea
	, MEA.Result_mea
	, ENP.Name_enp				AS	[Parameter]
	, MEU.ShortDescription_meu	AS	[UOM]
	--, PTR.Name_ptr				AS	[Uploaded_Parameter]
	--, MEU.LongDescription_meu
	--, MEU.Code_meu
	--, MEUX.ShortDescription_meu	AS	[UOM_TR]
	----, MEUX.Code_meu
	--, LIM.Name_lim
	--, LIM.InstallationId_lim
	--, SAT.Description_sat		AS	[Sample_Type]
	--, SMT.Name_smt				AS	[Sampling_Method]
	--, SAP.Name_sap				AS	[Sample_Purpose]
	--, STT.StaticName_stt		AS	[Station_Type]
	----, MEA.Accredited_mea
	, SAM.LastUpdateDate_sam
	, SAM.Sampler_sam
	, LTRIM(RTRIM(ULB.FirstName_usr)) + ' ' + LTRIM(RTRIM(ULB.LastName_usr)) AS	[UploadedBy]
	, ULB.Email_usr AS [Uploader_Email]
	, SAM.ApprovalDate_sam
	, LTRIM(RTRIM(UAP.FirstName_usr)) + ' ' + LTRIM(RTRIM(UAP.LastName_usr)) AS	[ApprovedBy]
	, UAP.Email_usr AS [Approver_Email]
	, LTRIM(RTRIM(UAT.FirstName_usr)) + ' ' + LTRIM(RTRIM(UAT.LastName_usr)) AS	[AuthLvlSetBy]
	, AUT.LastUpdateDate_flv	AS	[AuthLvlSetDate]
	, ULD.UploadId_uld
	, ULD.filename_uld
	--, ULD.UploadDate_uld
	--, ULD.Data_uld
	----, AUP.Name_aup
	, SAM.RevisionComment_sam
	, SAP.Name_sap
	, MEA.LastUpdateDate_mea

FROM		[EdenMDS-STG].dbo.tblSample_sam					SAM
LEFT JOIN	[EdenMDS-STG].dbo.tblStation_sta				STA	ON	STA.StationId_sta				= SAM.StationID_sta
LEFT JOIN	[EdenMDS-STG].dbo.tblMeasurement_mea			MEA	ON	MEA.SampleID_sam				= SAM.SampleID_sam
LEFT JOIN	[EdenMDS-STG].dbo.tblMeasurementUnit_meu		MEU	ON	MEU.MeasurementUnitID_meu		= MEA.MeasurementUnitID_meu
LEFT JOIN	[EdenMDS-STG].dbo.tblOrganisation_org			ORG	ON	ORG.OrganisationId_org			= STA.LocalAuthorityId_org
LEFT JOIN	[EdenSSO-STG].dbo.Organisation					SOR	ON	SOR.Code						= ORG.StaticName_org
LEFT JOIN	[EdenMDS-STG].dbo.tblUpload_uld					ULD	ON	ULD.UploadId_uld				= SAM.UploadId_uld
LEFT JOIN	[EdenMDS-STG].dbo.tblUser_usr					ULB ON	ULB.UserID_usr					= ULD.LastUpdatedBy_usr
LEFT JOIN	[EdenMDS-STG].dbo.tblUser_usr					UAP ON	UAP.UserID_usr					= SAM.ApprovedBy_usr
LEFT JOIN	[EdenMDS-STG].dbo.tblMonitoredEntity_men		MEN ON	MEN.MonitoredEntityId_men		= STA.MonitoredEntityId_men
LEFT JOIN	[EdenMDS-STG].dbo.tblMonitoredEntityType_met	MET ON	MET.MonitoredEntityTypeID_met	= MEN.MonitoredEntityTypeID_met
LEFT JOIN	[EdenMDS-STG].dbo.tblSchemeYear_scy				SCY ON	SCY.MonitoredEntityId_men		= MEN.MonitoredEntityId_men
LEFT JOIN	[EdenMDS-STG].dbo.tblReturnYear_rty				RTY ON	RTY.ReturnYear_rty				= SCY.ReturnYear_rty
LEFT JOIN	[EdenMDS-STG].dbo.tblReturnYearStatus_rst		RST ON	RST.StatusID_rst				= RTY.StatusID_rst
LEFT JOIN	[EdenMDS-STG].dbo.tblSamplePurpose_sap			SAP	ON	SAP.SamplePurposeID_sap			= SAM.SamplePurposeID_sap
LEFT JOIN	[EdenMDS-STG].dbo.tblSampleType_sat				SAT	ON	SAT.SampleTypeID_sat			= SAM.SampleTypeID_sat
LEFT JOIN	[EdenMDS-STG].dbo.tblSampleAuthorization_aut	AUT ON	AUT.SampleID_sam				= SAM.SampleID_sam
LEFT JOIN	[EdenMDS-STG].dbo.tblSamplingMethod_smt			SMT ON	SMT.SamplingMethodID_smt		= SAM.SamplingMethodID_smt
LEFT JOIN	[EdenMDS-STG].dbo.tblStationType_stt			STT	ON	STT.StationTypeId_stt			= STA.StationTypeId_stt
LEFT JOIN	[EdenMDS-STG].dbo.tblAuthorizationPurpose_aup	AUP ON	AUP.AuthorizationPurposeID_aup	= AUT.AuthorizationPurposeID_aup
LEFT JOIN	[EdenMDS-STG].dbo.tblUser_usr					UAT ON	UAT.UserID_usr					= AUT.LastUpdatedBy_usr
LEFT JOIN	[EdenMDS-STG].dbo.tblLimsInstallations_lim		LIM	ON	LIM.InstallationId_lim			= SAM.SourceSystem_lim
LEFT JOIN	[EdenMDS-STG].dbo.tblEnvironmentalParameter_enp	ENP	ON	ENP.EnvironmentalParameterID_enp = MEA.EnvironmentalParameterID_enp
LEFT JOIN	[EdenMDS-STG].dbo.tblParameterTranslation_ptr	PTR ON	(
														PTR.EnvironmentalParameterID_enp	= ENP.EnvironmentalParameterID_enp
														AND
														PTR.InstallationId_lim				= SAM.SourceSystem_lim
														)
LEFT JOIN	[EdenMDS-STG].dbo.tblUser_usr							UPT	 ON	UPT.UserID_usr						= PTR.LastUpdatedBy_usr
LEFT JOIN	[EdenMDS-STG].dbo.tblParameterMeasurementUnitMatrix_pmx	PMX	 ON	PMX.EnvironmentalParameterId_enp	= ENP.EnvironmentalParameterID_enp
LEFT JOIN	[EdenMDS-STG].dbo.tblMeasurementUnit_meu				MEUX ON	MEUX.MeasurementUnitID_meu			= PMX.MeasurementUnitID_meu

WHERE	YEAR(SAM.Date_sam) <= '2015'
--AND		MET.Name_met		 LIKE	 '%Lake%'
--AND	  	mea.[lastupdatedate_mea] >= :sql_last_value
