SELECT 
VECT_STA.StationID	AS	[station_national_code]	
, VECT_STA.OBJECTID
, VECT_STA.StationID
, VECT_STA.StationID
, VECT_STA.StationName
, VECT_STA.StationType
, VECT_STA.WFDWISECODE
, VECT_STA.EntityCode
, VECT_STA.EntityName
, VECT_STA.WBWFDWISECODE
, VECT_STA.MonitoredEntityType
, VECT_STA.LocalAuthority
, VECT_STA.RiverBasinDistrict
, VECT_STA.CreatedByOrganisation
, VECT_STA.EPAStationType
, VECT_STA.SegCd
, VECT_STA.Media
, VECT_STA.DataSource
, VECT_STA.Biological
, VECT_STA.Chemical
, VECT_STA.WFD
, VECT_STA.GWQuality
, VECT_STA.GWQuantity
, VECT_STA.EPALink
, VECT_STA.Easting
, VECT_STA.Northing
, VECT_STA.LastUpdateDate
, VECT_STA.LastUpdateComment
, VECT_STA.MeasureAlong
, VECT_STA.AssociatedFeature
, VECT_STA.AssociatedFeatureName
, VECT_STA.LocalAuthoritySpatial
, CAST(VECT_STA.Latitude AS VARCHAR(26))
, CAST(VECT_STA.Longitude AS VARCHAR(26))
, CAST(VECT_STA.Latitude AS VARCHAR(26)) + ', ' + CAST(VECT_STA.Longitude AS VARCHAR(26)) AS [location]
FROM	[vector].[sde].[MON_WATERSTATIONS] VECT_STA
WHERE	VECT_STA.[LastUpdateDate] >= :sql_last_value