SELECT
	--LOC.LocationId
	LOC.Code 								AS [location_code]
	, LOC.Name 							AS [location_name]
	, LOC.Hashtag
	, LOC.CountyName				AS [county_name]
	, LOC.OrganisationName	AS [organisation_name]
	, ORG.Code							AS [organisation_code]
	, LOC.EdenMonitoredStationCode
	, LOC.Easting
	, LOC.Northing
	, LOC.EtrsX
	, LOC.EtrsY
	, LOC.Information   		AS [information]-- Check html tags
	, LOC.Assessment
	, LOC.NextMonitoringDate
	, LOC.MainPhotoUrl
	, LOC.MainPhotoDescription
	, LOC.MainPhotoThumbnailUrl
	, LOC.ProfileUrl
	, LOC.ProfileUrlDescription
	, LOC.ProfileLastUpdatedOn  -- Check nulls
	, LOC.WaterQualityName		-- What is it used for? Where does it come from?
	, LOC.AnnualClassificationName
	, LOC.AnnualClassificationYear
	, LOC.AnnualClassificationYear1Name
	, LOC.AnnualClassificationYear1Year
	, LOC.AnnualClassificationYear2Name
	, LOC.AnnualClassificationYear2Year
	, LOC.AnnualClassificationYear3Name
	, LOC.AnnualClassificationYear3Year
	, LOC.ClosedTypeName  --??? Change data value
	, LOC.StatusTypeName
	, LOC.RestrictionTypeName
	, LOC.HasRestrictionInPlace
	, LOC.ClosedReason
	, LOC.STPRisk
	, LOC.STPClosedDays
	, LOC.IsBlueFlag
	, LOC.IsGreenCoast
	, LOC.IsToiletsAvailable
	, LOC.ToiletsAvailableDetails
	, LOC.IsDogsAllowedOnLead
	, LOC.DogsAllowedOnLeadDetails
	, LOC.IsDisabilityAccessible
	, LOC.DisabilityAccessibleDetails
	, LOC.IsParkingAvailable
	, LOC.ParkingAvailableDetails
	, LOC.IsNaturalSensitiveArea
	, LOC.NaturalSensitiveAreaDetails
	, LOC.IsFirstAid
	, LOC.FirstAidDetails
	, LOC.IsLifebuoyAvailable
	, LOC.LifebuoyAvailableDetails
	, LOC.IsBeachWheelchairAvailable
	, LOC.BeachWheelchairAvailableDetails
	, LOC.IsLifeguardAvailable
	, LOC.LifeguardAvailableDetails
	, LOC.IsPublicTransportAvailable
	, LOC.PublicTransportAvailableDetails
	, LOC.IsCarsNotAllowedOnBeach
	, LOC.CarsNotAllowedOnBeachDetails
	, LOC.IsCarsAllowedOnBeach
	, LOC.CarsAllowedOnBeachDetails
	, LOC.IsCarFreeZone
	, LOC.CarFreeZoneDetails
	, LOC.IsDogsNotAllowed
	, LOC.DogsNotAllowedDetails
	, LOC.IsBeachActivityZonesAvailable
	, LOC.BeachActivityZonesAvailableDetails
	, LOC.IsBeachInformationBoardAvailable
	, LOC.BeachInformationBoardAvailableDetails
	, LOC.IsLitterBinAvailable
	, LOC.LitterBinAvailableDetails
	, LOC.IsRecyclingFacilityAvailable
	, LOC.RecyclingFacilityAvailableDetails
	, LOC.LastUpdatedOn	AS [lastupdatedon]
	--, LOC.Shape
	--, LOC.CountyId
	--, LOC.OrganisationId
	--, LOC.WaterQualityId
	--, LOC.AnnualClassificationId
	--, LOC.AnnualClassificationYear1Id
	--, LOC.AnnualClassificationYear2Id
	--, LOC.AnnualClassificationYear3Id
	--, LOC.StatusTypeId
	--, LOC.RestrictionTypeId
	--, LOC.ClosedTypeId

FROM			[BathingWater-STG].[dbo].[Location]			LOC
LEFT JOIN	[BathingWater-STG].[dbo].[Organisation]	ORG	ON ORG.OrganisationId	= LOC.OrganisationId

WHERE			LastUpdatedOn 	<=	GETDATE()
--AND				LastUpdatedOn 	>= :sql_last_value

ORDER BY 	LastUpdatedOn