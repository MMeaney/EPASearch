SELECT	DISTINCT

CMPLNT.epa_casenumber
, CMPLNT.lema_licenselocalauthority
, CMPLNT.epa_complaintissuename
	
, CMPLNT.epa_dateofoccurance
, CMPLNT.epa_durationofoccurance

, CMPLNT.statuscodename

, CMPLNT.epa_confidential
, CMPLNT.epa_confidentialname
, CMPLNT.epa_domplaintdetail
, CMPLNT.epa_areaofaffectoncomplainantname
, CMPLNT.epa_complianceinvestigationidname

, CMPLNT.epa_licenceid
, CMPLNT.epa_complaintid


, CMPLNT.epa_location
, CMPLNT.epa_licenceidname
, CMPLNT.lema_licenseregnumber
, CMPLNT.epa_name

, CMPLNT.createdby
, CMPLNT.createdbyname
, CMPLNT.createdbyyominame
, CMPLNT.createdon
, CMPLNT.createdonutc
, CMPLNT.createdonbehalfby
, CMPLNT.createdonbehalfbyname
, CMPLNT.createdonbehalfbyyominame
, CMPLNT.epa_areaofaffectoncomplainant
, CMPLNT.epa_closedon
, CMPLNT.epa_closedonutc
, CMPLNT.epa_complainantaddress1
, CMPLNT.epa_complainantaddress2
, CMPLNT.epa_complainantcounty
, CMPLNT.epa_complainantcountyname
, CMPLNT.epa_complainantemailaddress
, CMPLNT.epa_complainantfirstname
, CMPLNT.epa_complainantid
, CMPLNT.epa_complainantidname
, CMPLNT.epa_complainantidyominame
, CMPLNT.epa_complainantlastname
, CMPLNT.epa_complainantmobilephoneno
, CMPLNT.epa_complainanttelephonenumber
, CMPLNT.epa_complainantsalutation
, CMPLNT.epa_complainanttown
, CMPLNT.epa_complaintissue
, CMPLNT.epa_complianceinvestigationid
, CMPLNT.epa_correspondencereview
, CMPLNT.epa_correspondencereviewname
, CMPLNT.epa_dateofoccuranceutc
, CMPLNT.epa_detailofcontactwithlicensee
, CMPLNT.epa_licenceecounty
, CMPLNT.epa_licenceecountyname
, CMPLNT.epa_licencetown
, CMPLNT.epa_nofurthercorrespondence
, CMPLNT.epa_nofurthercorrespondencename
, CMPLNT.epa_odourextent
, CMPLNT.epa_odourextentname
, CMPLNT.epa_odourintensity
, CMPLNT.epa_odourintensityname
, CMPLNT.epa_odourissueexperienced
, CMPLNT.epa_odourissueexperiencedname
, CMPLNT.epa_odourprecipitation
, CMPLNT.epa_odourprecipitationname
, CMPLNT.epa_odourtemperature
, CMPLNT.epa_odourtemperaturename
, CMPLNT.epa_odourwindstrength
, CMPLNT.epa_odourwindstrengthname
, CMPLNT.epa_persistence
, CMPLNT.epa_persistencename
, CMPLNT.epa_reasonforinvalid
, CMPLNT.epa_recordsource
, CMPLNT.epa_recordsourcename
, CMPLNT.epa_reportedtolicensee
, CMPLNT.epa_reportedtolicenseename
, CMPLNT.epa_statuschangeddate
, CMPLNT.epa_statuschangeddateutc
, CMPLNT.epa_validity
, CMPLNT.epa_validityname
, CMPLNT.importsequencenumber
, CMPLNT.lema_inspectorsupdate
, CMPLNT.lema_licensedbyepa
, CMPLNT.lema_licensedbyepaname
, CMPLNT.lema_licensedfacilityknown
, CMPLNT.lema_licensedfacilityknownname
, CMPLNT.lema_likelycauseid
, CMPLNT.lema_likelycauseidname
, CMPLNT.lema_region
, CMPLNT.lema_regionname
, CMPLNT.modifiedby
, CMPLNT.modifiedbyname
, CMPLNT.modifiedbyyominame
, CMPLNT.modifiedon
, CMPLNT.modifiedonutc
, CMPLNT.modifiedonbehalfby
, CMPLNT.modifiedonbehalfbyname
, CMPLNT.modifiedonbehalfbyyominame
, CMPLNT.overriddencreatedon
, CMPLNT.overriddencreatedonutc
, CMPLNT.ownerid
, CMPLNT.owneriddsc
, CMPLNT.owneridname
, CMPLNT.owneridtype
, CMPLNT.owneridyominame
, CMPLNT.owningbusinessunit
, CMPLNT.owningteam
, CMPLNT.owninguser
, CMPLNT.statecode
, CMPLNT.statecodename
, CMPLNT.statuscode
, CMPLNT.timezoneruleversionnumber
, CMPLNT.utcconversiontimezonecode
, LIC.epa_name AS epa_licencename
FROM		[LEAP].[dbo].[Complaint] CMPLNT
LEFT JOIN	[LEAP].[dbo].[Licence]	 LIC		ON CMPLNT.epa_licenceid = LIC.epa_licenceid
--AND		CMPLNT.modifiedonutc >= :sql_last_value