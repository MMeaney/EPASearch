SELECT
	MEA.measurementID
	, LOC.[code]			AS [LocationCode]
	, LOC.name				AS [LocationName]
	, LOC.displayName		AS [LocationDisplayName]
	, LOC.nuts				AS [LocationNUTS]
	, LOC.latitude_DEC
	, LOC.longitude_DEC
	, LOC.latitude_IG
	, LOC.longitude_IG
	, LOC.latitude_ITM
	, LOC.longitude_ITM
	, LOC.catchment			AS [LocationCatchment]
	, LOC.heightAboveLand
	, LOC.heightAboveSea
	, CNTRY.code			AS [CountryCode]
	, CNTRY.name			AS [CountryName]
	, ACCTYP.[code]			AS [AccuracyTypeCode]
	, ACCTYP.[description]	AS [AccuracyTypeDescription]
	, LOCTYP.[description]	AS [LocationTypeDescription]
	, LOC.thirdPartyCode	AS [LocationThirdPartyCode]
	, LOC.comments			AS [LocationComments]
	, LOC.x_background
	, LOC.x_EURDEPStationID
	, SRC.[code]			AS [SourceCode]
	, SRC.name				AS [SourceName]
	, SRC.[description]		AS [SourceDescription]
	, LAB.[code]			AS [LaboratoryCode]
	, LAB.name				AS [LaboratoryName]
	, LAB.section			AS [LaboratorySection]
	, SMPTYP.[code]			AS [SampleTypeCode]
	, SMPTYP.[description]	AS [SampleTypeDescription]
	, NUC.[code]			AS [NuclideCode]
	, NUC.[description]		AS [NuclideDescription]
	, INST.[code]			AS [InstrumentCode]
	, INST.[description]	AS [InstrumentDescription]		
	, MEA.beginMeas
	, MEA.endMeas
	, MEA.measurementInterval
	, MEA.isMDA
	, MEA.value
	, UNTVAL.[code]			AS [ValueUnitCode]
	, UNTVAL.[description]	AS [ValueUnitDescription]
	, VALTYP.[code]			AS [ValueTypeCode]
	, VALTYP.[description]	AS [ValueTypeDescription]
	, MEA.uncertainty
	, UNTUNC.[code]			AS [UncertaintyUnitCode]
	, UNTUNC.[description]	AS [UncertaintyUnitDescription]
	, UNCTYP.[code]			AS [UncertaintyTypeCode]
	, UNCTYP.[description]	AS [UncertaintyTypeDescription]
	, MEA.background	
	, UNTBCK.[code]			AS [BackgroundUnitCode]
	, UNTBCK.[description]	AS [BackgroundUnitDescription]
	, MEA.lastUpdated
	, MEA.depth
	, MEA.nativeSampleID
	, MEA.alternativeNativeSampleID
	, MEA.nativeAnalysisID
	, MEA.comments
	, MEA.x_recordCount
	, MEA.coreHeight
	, MEA.IsApproved
	, MEA.sampTime
	, MEA.DW_ratio
	, MEA.VOL_AIR
	, MEA.resultNumber
	, SMPT.[code]			AS [SampleTreatmentCode]
	, SMPT.[description]	AS [SampleTreatmentDescription]

FROM	  [ERIC].dbo.Measurement	MEA
LEFT JOIN [ERIC].dbo.Location		LOC		ON LOC.locationID			= MEA.locationID
LEFT JOIN [ERIC].dbo.Country		CNTRY	ON CNTRY.countryID			= LOC.countryID
LEFT JOIN [ERIC].dbo.AccuracyType	ACCTYP	ON ACCTYP.accuracyTypeID	= LOC.accuracyTypeID
LEFT JOIN [ERIC].dbo.LocationType	LOCTYP	ON LOCTYP.locationTypeID	= LOC.locationTypeID
LEFT JOIN [ERIC].dbo.[Source]		SRC		ON SRC.sourceID				= MEA.sourceID
LEFT JOIN [ERIC].dbo.Laboratory		LAB		ON LAB.laboratoryID			= SRC.laboratoryID
LEFT JOIN [ERIC].dbo.SampleType		SMPTYP	ON SMPTYP.sampleTypeID		= MEA.sampleTypeID
LEFT JOIN [ERIC].dbo.Nuclide		NUC		ON NUC.nuclideID			= MEA.nuclideID
LEFT JOIN [ERIC].dbo.Instrument		INST	ON INST.instrumentID		= MEA.instrumentID
LEFT JOIN [ERIC].dbo.ValueType		VALTYP	ON VALTYP.valueTypeID		= MEA.valueTypeID
LEFT JOIN [ERIC].dbo.UncertaintyType UNCTYP	ON UNCTYP.uncertaintyTypeID	= MEA.uncertaintyTypeID
LEFT JOIN [ERIC].dbo.Unit			UNTVAL	ON UNTVAL.UnitID			= MEA.valueUnitID
LEFT JOIN [ERIC].dbo.Unit			UNTUNC	ON UNTUNC.UnitID			= MEA.uncertaintyUnitID
LEFT JOIN [ERIC].dbo.Unit			UNTBCK	ON UNTBCK.UnitID			= MEA.backgroundUnitID
LEFT JOIN [ERIC].dbo.MeasurementToSampleTreatment MTST	ON MTST.measurementID	= MEA.measurementID
LEFT JOIN [ERIC].dbo.SampleTreatment SMPT	ON SMPT.sampleTreatmentID	= MTST.sampleTreatmentID

WHERE	MEA.lastUpdated >= :sql_last_value