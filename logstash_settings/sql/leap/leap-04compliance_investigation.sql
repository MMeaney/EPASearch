SELECT DISTINCT

CMPINV.epa_casenumber
, CMPINV.epa_complianceinvestigationissuename
, CMPINV.epa_responselevelname
, CMPINV.createdon
, CMPINV.statuscodename
, CMPINV.epa_description
, CMPINV.epa_originname


, CMPINV.epa_nextactiondate
, CMPINV.epa_closedate

, CMPINV.epa_licenceidname
, CMPINV.lema_licenseregnumber	
, CMPINV.lema_licenselocalauthority
, CMPINV.epa_licenceid

, CMPINV.lema_likelycauses
, CMPINV.epa_score

--, NONCMP.lema_casenumber

, CMPINV.createdby
, CMPINV.createdbyname
, CMPINV.createdbyyominame
, CMPINV.createdonutc
, CMPINV.createdonbehalfby
, CMPINV.createdonbehalfbyname
, CMPINV.createdonbehalfbyyominame
, CMPINV.epa_closedateutc
, CMPINV.epa_closedby
, CMPINV.epa_closedbyname
, CMPINV.epa_closedbyyominame
, CMPINV.epa_complianceinvestigationid
, CMPINV.epa_complianceinvestigationissue
, CMPINV.epa_expectedclosedate
, CMPINV.epa_expectedclosedateutc
, CMPINV.epa_itsnew
, CMPINV.epa_itsnewname
, CMPINV.epa_nextactiondateutc
, CMPINV.epa_origin
, CMPINV.epa_responselevel
, CMPINV.epa_responselevelmanuallyset
, CMPINV.epa_responselevelmanuallysetname
, CMPINV.epa_text
, CMPINV.epa_titlename
, CMPINV.importsequencenumber
, CMPINV.lema_effects
, CMPINV.lema_inspectorsupdate
, CMPINV.lema_potentialprosecution
, CMPINV.lema_potentialprosecutiondate
, CMPINV.lema_potentialprosecutiondateutc
, CMPINV.lema_potentialprosecutionname
, CMPINV.lema_region
, CMPINV.lema_regionname
, CMPINV.lema_regnumber
, CMPINV.modifiedby
, CMPINV.modifiedbyname
, CMPINV.modifiedbyyominame
, CMPINV.modifiedon
, CMPINV.modifiedonutc
, CMPINV.modifiedonbehalfby
, CMPINV.modifiedonbehalfbyname
, CMPINV.modifiedonbehalfbyyominame
, CMPINV.overriddencreatedon
, CMPINV.overriddencreatedonutc
, CMPINV.ownerid
, CMPINV.owneriddsc
, CMPINV.owneridname
, CMPINV.owneridtype
, CMPINV.owneridyominame
, CMPINV.owningbusinessunit
, CMPINV.owningteam
, CMPINV.owninguser
, CMPINV.statecode
, CMPINV.statecodename
, CMPINV.statuscode
, CMPINV.timezoneruleversionnumber
, CMPINV.utcconversiontimezonecode
FROM		[LEAP].[dbo].[ComplianceInvestigation]	CMPINV