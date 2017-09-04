SELECT DISTINCT


NONCMP.lema_casenumber
, NONCMP.epa_dateofnoncompliance
, NONCMP.epa_noncompliancetypename

, NONCMP.epa_dateofnotification
, NONCMP.epa_condition

, NONCMP.epa_description

--, CMPINV.epa_casenumber



, NONCMP.epa_licenceid
, NONCMP.epa_noncomplianceid
, NONCMP.epa_complianceinvestigationid
, NONCMP.epa_case
, NONCMP.epa_complianceinvestigationidname

, NONCMP.epa_licenceidname
, NONCMP.createdby
, NONCMP.createdbyname
, NONCMP.createdbyyominame
, NONCMP.createdon
, NONCMP.createdonutc
, NONCMP.createdonbehalfby
, NONCMP.createdonbehalfbyname
, NONCMP.createdonbehalfbyyominame
, NONCMP.epa_complaintid
, NONCMP.epa_complaintidname
, NONCMP.epa_dateofnoncomplianceutc
, NONCMP.epa_dateofnotificationutc
, NONCMP.epa_incidentid
, NONCMP.epa_incidentidname
, NONCMP.epa_noncompliancetype
, NONCMP.epa_title
, NONCMP.importsequencenumber
, NONCMP.lema_licenseesubmissionid
, NONCMP.lema_licenseesubmissionidname
, NONCMP.lema_region
, NONCMP.lema_regionname
, NONCMP.modifiedby
, NONCMP.modifiedbyname
, NONCMP.modifiedbyyominame
, NONCMP.modifiedon
, NONCMP.modifiedonutc
, NONCMP.modifiedonbehalfby
, NONCMP.modifiedonbehalfbyname
, NONCMP.modifiedonbehalfbyyominame
, NONCMP.overriddencreatedon
, NONCMP.overriddencreatedonutc
, NONCMP.ownerid
, NONCMP.owneriddsc
, NONCMP.owneridname
, NONCMP.owneridtype
, NONCMP.owneridyominame
, NONCMP.owningbusinessunit
, NONCMP.owningteam
, NONCMP.owninguser
, NONCMP.statecode
, NONCMP.statecodename
, NONCMP.statuscode
, NONCMP.statuscodename
, NONCMP.timezoneruleversionnumber
, NONCMP.utcconversiontimezonecode
FROM		[LEAP].[dbo].[NonCompliance]			NONCMP